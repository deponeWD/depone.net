// These two scripts are borrowed from Remy Sharp
// Following his post about Offline listings: https://remysharp.com/2019/09/05/offline-listings
const today = new Date();
today.setHours(0, 0, 0, 0);

function daysAgo(date) {
  date.setHours(0, 0, 0, 0);
  const time = date.getTime();
  const now = today.getTime();
  const delta = ((now - time) / 1000 / 60 / 60 / 24) | 0;

  if (delta < 1) {
    return 'heute';
  }

  if (delta === 1) {
    return 'gestern';
  }

  return `vor ${delta | 0} Tagen`;
}

async function listPages() {
  // since my cache names are versioned, look for the one that
  // includes "pages"
  const cacheNames = await caches.keys();

  // results is recently visited blog posts
  const results = [];

  for (const name of cacheNames) {
    if (name.includes('pages')) {
      const cache = await caches.open(name);

      // get a list of all the entries (keys are requests)
      for (const request of await cache.keys()) {
        const url = request.url;

        // this regex gets both the publish date of the post,
        // but also ensures the URL is a blog post
        const match = url.match(/\/(\d{4})\/(\d{2})\/(\d{2})\//);

        if (match) {
          const response = await cache.match(request);

          // capture the plain text HTML
          const body = await response.text();

          // regex for the title of the post
          // remove blogname that comes after a &middot;
          const title = body.match(/<title>(.*)<\/title>/)[1].split('&middot;')[0];

          results.push({
            url,
            response,
            title,
            // published date is from the URL
            published: new Date(match.slice(1).join('-')),
            // last visited is the `date` prop in the response header
            visited: new Date(response.headers.get('date'))
          });
        }
      }
    }
  }

  // now display the results
  let listForCachedPosts = document.querySelector('ol#cached-posts');
  if (results.length) {
    // sort the results, map each result to an <li> tag and put
    // in the `ol#cached-posts` element
    listForCachedPosts.innerHTML = results
      .sort((a, b) => a.published.toJSON() < b.published.toJSON() ? 1 : -1)
      .map(res => {
        // results in:
        //  <li><a href="…">[ Title ] <small>[pubDate] (visited X days ago)</small></a></li>
        let html = `<li><a href="${res.url}">${
          res.title
        }</a> <small class="date">vom ${res.published.toLocaleDateString('de-DE')} <span title="${res.visited.toString()}">(${daysAgo(res.visited)} besucht)</span></small></li>`;
        return html;
      })
      .join('\n');
  } else {
    let errorMessage = document.createElement('p');
    let errorMessageContent = document.createTextNode('Sorry, es konnten keine Posts aus dem Cache geholt werden.');
    errorMessage.appendChild(errorMessageContent);
    listForCachedPosts.parentElement.insertBefore(errorMessage, listForCachedPosts);
  }
}

listPages();

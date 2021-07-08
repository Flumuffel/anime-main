var querys = {
    'hero': `query {
        Page(perPage: 12){
            media(type: ANIME, isAdult: false, status: RELEASING, popularity_greater:5000, sort: START_DATE_DESC){
                id
                title{
                    romaji
                    english
                    native
                    userPreferred
                }
                description
                genres
                startDate {
                    year
                    month
                    day
                }
                coverImage {
                    extraLarge
                    large
                    medium
                    color
                }
                bannerImage
                status
                episodes
            }
        }
    }`,



    'popular': `
    query {
        Page(perPage: 12){
            media(type: ANIME, isAdult: false, status: FINISHED, popularity_greater:5000, sort: POPULARITY_DESC){
                id
                title{
                    romaji
                    english
                    native
                    userPreferred
                }
                description
                genres
                startDate {
                    year
                    month
                    day
                }
                format
                popularity
                coverImage {
                    extraLarge
                    large
                    medium
                    color
                }
                bannerImage
                status
                siteUrl
                episodes
                nextAiringEpisode{
                    episode
                }
                stats {
                    statusDistribution {
                        amount
                    }
                }
            }
        }
    }`,



    'recent': `
    query {
        Page(perPage: 20){
            media(type: ANIME, isAdult: false, status: RELEASING, popularity_greater:5000, sort: START_DATE_DESC){
                id
                title{
                    romaji
                    english
                    native
                    userPreferred
                }
                description
                genres
                startDate {
                    year
                    month
                    day
                }
                format
                popularity
                coverImage {
                    extraLarge
                    large
                    medium
                    color
                }
                bannerImage
                status
                siteUrl
                episodes
                nextAiringEpisode{
                    episode
                }
                stats {
                    statusDistribution {
                        amount
                    }
                }
            }
        }
    }`
}

function showAnime(query, choose, show) {
    queryFetch(query, { }).then(data => {
        var json = JSON.parse(JSON.stringify(data.data, null, 4));
        var count = 0;
        var max = show
        json.Page.media.every(anime => {
            if (anime.bannerImage != null) {
                if(count >= max) {
                    return false
                }

                //Desc
                var desc = anime.description
                var char = 50
                desc = desc.slice(0, char) + (desc.length > char ? "..." : "");

                // New Popular
                let newPopular = document.createElement('div')
                newPopular.className = "col-lg-3 col-md-6 col-sm-6"

                    // Item
                    let item = document.createElement('div')
                    item.className = "product__item"
                    newPopular.appendChild(item)

                        // Picture
                        let pic = document.createElement('div')
                        pic.className = "product__item__pic set-bg"
                        pic.setAttribute('data-setbg', anime.coverImage.large)
                        item.appendChild(pic)

                            // Episode
                            let ep = document.createElement('div')
                            ep.className = "ep"
                            let eps = anime.episodes || '?'
                            if(anime.nextAiringEpisode != null){
                                ep.innerHTML = (anime.nextAiringEpisode.episode-1) + " / " + eps
                            } else {
                                ep.innerHTML = anime.episodes + " / " + eps
                            }
                            pic.appendChild(ep)

                            // Comment
                            let format = document.createElement('div')
                            format.className = "comment"
                            format.innerHTML = " " + anime.format
                            pic.appendChild(format)

                            // Views
                            let views = document.createElement('div')
                            views.className = "view"
                            views.innerHTML = '<i class="fa fa-eye"></i> ' + numFormatter(anime.stats.statusDistribution[2].amount) + '</div>'
                            pic.appendChild(views)

                        // Meta
                        let meta = document.createElement('div')
                        meta.className = "product__item__text"
                        item.appendChild(meta)

                            // Meta Tags
                            let mtags = document.createElement('ul')
                            anime.genres.every(genre => {
                                mtags.innerHTML += "<li>"+genre+"</li>"
                                return true
                            })
                            meta.appendChild(mtags)

                            // Title
                            let title = document.createElement('h5')
                            title.innerHTML = '<a href="'+anime.siteUrl+'">'+anime.title.userPreferred+'</a>'
                            meta.appendChild(title)

                choose.appendChild(newPopular)

                count++;
                return true
            }
            return true
        })
    })
}

function showHero(query, slider, show) {
    queryFetch(query, { }).then(data => {
        var json = JSON.parse(JSON.stringify(data.data, null, 4));
        var count = 0;
        json.Page.media.every(anime => {
            if (anime.bannerImage != null) {
                if(count >= show) {
                    return false
                }

                //Desc
                var desc = anime.description
                var char = 50
                desc = desc.slice(0, char) + (desc.length > char ? "..." : "");

                // New Hero
                let newHero = document.createElement('div')
                newHero.className = "hero__items set-bg"
                newHero.setAttribute('data-setbg', anime.bannerImage)
                newHero.setAttribute('style', 'box-shadow:inset 0 0 0 2000px rgba(46, 49, 49, 0.4)')

                // Row
                let row = document.createElement('div')
                row.className = "row"
                newHero.appendChild(row)

                // Collum
                let col = document.createElement('div')
                col.className = "col-lg-6"
                row.appendChild(col)

                // Hero Text
                let heroText = document.createElement('div')
                heroText.className = "hero__text"
                col.appendChild(heroText)

                // Label
                let label = document.createElement('div')
                label.className = "label"
                label.innerHTML = anime.genres[Math.floor(Math.random() * anime.genres.length)]
                heroText.appendChild(label)
                
                // Title
                let title = document.createElement('h2')
                title.innerHTML = anime.title.userPreferred
                heroText.appendChild(title)

                // Desc
                let description = document.createElement('p')
                description.innerHTML = desc
                heroText.appendChild(description)
                
                //Watch now
                heroText.innerHTML += '<a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>'

                slider.appendChild(newHero)

                count++;
                return true
            }
            return true
        })
    })
}
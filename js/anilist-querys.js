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
                siteUrl
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
    }`,

    'showDetails': `
    query getAnime($anime: String, $id: Int) {
        Page(perPage: 48){
            media(search: $anime, id: $id, type: ANIME, isAdult: false){
            id
            title{
                romaji
                english
                native
                userPreferred
            }
            trailer {
                id
            }
            description
            genres
            averageScore
            startDate {
                year
                month
                day
            }
            endDate {
                year
                month
                day
            }
            format
            duration
            popularity
            coverImage {
                extraLarge
                large
                medium
                color
            }
            bannerImage
            status
            studios {
                nodes {
                    id
                    name
                }
            }
            siteUrl
            episodes
            nextAiringEpisode{
                episode
            }
            streamingEpisodes {
                title
                thumbnail
                url
                site
            }
            stats {
                statusDistribution {
                    amount
                }
            }
        }
    }}`,

    'showEpisode': `
    query getAnime($anime: String, $id: Int) {
        Page(perPage: 48){
            media(search: $anime, id: $id, type: ANIME, isAdult: false){
            id
            title{
                romaji
                english
                native
                userPreferred
            }
            description
            genres
            averageScore
            startDate {
                year
                month
                day
            }
            endDate {
                year
                month
                day
            }
            format
            duration
            popularity
            coverImage {
                extraLarge
                large
                medium
                color
            }
            bannerImage
            status
            studios {
                nodes {
                    id
                    name
                }
            }
            siteUrl
            episodes
            nextAiringEpisode{
                episode
            }
            streamingEpisodes {
                title
                thumbnail
                url
                site
            }
            stats {
                statusDistribution {
                    amount
                }
            }
        }
    }}`
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

                            // Watches
                            var watches = 0
                            anime.stats.statusDistribution.every(stat => {
                                watches += stat.amount
                                console.log(watches)
                                return true
                            })

                            // Views
                            let views = document.createElement('div')
                            views.className = "view"
                            views.innerHTML = '<i class="fa fa-eye"></i> ' + numFormatter(watches) + '</div>'
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
                            title.innerHTML = '<a href="/anime/'+anime.id+'">'+anime.title.userPreferred+'</a>'
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
                heroText.innerHTML += '<a href="/anime/'+anime.id+'"><span>Mehr Info</span> <i class="fa fa-angle-right"></i></a>'

                slider.appendChild(newHero)

                count++;
                return true
            }
            return true
        })
    })
}

function animeDetails(query, id) {
    console.log(id);
    queryFetch(query, { "id": parseInt(id) }).then(data => {
        var json = JSON.parse(JSON.stringify(data.data, null, 4));
        json.Page.media.every(anime => {
            console.log(anime)

                // Title
                $('.anime__details__title h3')[0].innerHTML = anime.title.english     // Change Title
                $('.breadcrumb__links > span')[0].innerHTML = anime.title.english
                $('.anime__details__title span')[0].innerHTML = anime.title.native          // Japan Title

                // Desc
                var desc = anime.description
                var char = 300
                desc = desc.slice(0, char) + (desc.length > char ? "..." : "");
                $('.anime__details__text > p')[0].innerHTML = desc

                // Ratings
                var aRating = Math.round((anime.averageScore / 100 * 5)*2)/2
                var ratings = $('.anime__details__rating > .rating a > i')
                var halfe = false

                ratings.each(rate => {

                    if (aRating > (rate + 1)){
                        ratings[rate].className = "fa fa-star"
                    } else if(aRating == (rate + 1)){
                        ratings[rate].className = "fa fa-star"
                        halfe = true
                    } else if(halfe != true) {
                        halfe = true
                        ratings[rate].className = "fa fa-star-half-o"
                    } else {
                        ratings[rate].className = "fa fa-star-o"
                    }
                })

                $('.anime__details__rating > span')[0].innerHTML = numFormatter(anime.stats.statusDistribution[2].amount) + " Votes"

                // Watches
                var watches = 0
                anime.stats.statusDistribution.every(stat => {
                    watches += stat.amount
                    return true
                })

                // Trailer
                console.log(anime.trailer != null)
                if(anime.trailer != null) {
                    $('#trailerStream')[0].setAttribute("src", "https://www.youtube.com/embed/"+anime.trailer.id)
                } else {
                    $('#trailerBtn')[0].remove();
                    $('#trailerModal')[0].remove();
                }

                // Image
                $('.anime__details__pic')[0].setAttribute('data-setbg', anime.coverImage.extraLarge)
                
                // Type & Views
                $('.comment')[0].innerHTML = " " + anime.format                             // Type
                $('.view')[0].innerHTML = '<i class="fa fa-eye"></i> ' + numFormatter(watches) + '</div>'

                // Anime Details
                    var months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
                    // Left
                    var aGenre = ""
                    var count = 0
                    anime.genres.every(genre => {
                        if(count >= 3) {
                            aGenre += genre
                            return false
                        }
                        aGenre += genre + ", "
                        count++
                        return true
                    })

                    var leftOp = [
                        '<span>Type:</span>'+anime.format, 
                        '<span>Studios:</span>'+anime.studios.nodes[0].name,
                        '<span>Data aired:</span>'+ months[anime.startDate.month] + ", " + anime.startDate.year + " to " + (anime.endDate.year != undefined ? months[anime.endDate.month] + ", " + anime.endDate.year : "?"),
                        '<span>Status:</span>'+ capitalizeFirstLetter(anime.status.toLowerCase()),
                        '<span>Genre:</span>'+ aGenre
                    ]
                    
                    var left = $('.anime__details__widget > .row > .left > ul > li')
                    left.each(i => {
                        if(leftOp[i] != undefined) {
                            left[i].innerHTML = leftOp[i]
                        }
                    })
                    
                    // Right
                    var rightOp = [
                        '<span>Rating:</span>' + aRating + " / " + numFormatter(anime.stats.statusDistribution[2].amount),
                        '<span>Duration:</span>' + anime.duration + " min/ep",
                        '<span>Views:</span>' + numFormatter(watches)
                    ]

                    var right = $('.anime__details__widget > .row > .right > ul > li')
                    right.each(i => {
                        if(rightOp[i] != undefined) {
                            right[i].innerHTML = rightOp[i]
                        }
                    })

                // Check Episodes
                console.log("Anime Episode Streaming: "+anime.streamingEpisodes.length)
                if(anime.streamingEpisodes.length == 0) {
                    console.log("DELETE WATCH BUTTON")
                    $('.watch-btn')[0].remove()
                }
            return true
        })
    })
}

function showEpisode(query, id) {
    console.log(id);

    queryFetch(query, { "id": parseInt(id) }).then(data => {
        var json = JSON.parse(JSON.stringify(data.data, null, 4));
        if (json.Page.media.length == 0) {
            history.back();
        }
        json.Page.media.every(anime => {
            console.log(anime)
            console.log("CHECK EPISODE: "+ parseInt($('.breadcrumb__links > span')[0].innerHTML))
            if (anime.streamingEpisodes[parseInt($('.breadcrumb__links > span')[0].innerHTML)] == undefined) {
                if(document.referrer != "") {
                    window.location.href=document.referrer + "?noEpFound=" + parseInt($('.breadcrumb__links > span')[0].innerHTML);
                } else {
                    window.location.href="/anime/"+id+"/episode/1?noEpFound=" + parseInt($('.breadcrumb__links > span')[0].innerHTML);
                }
            }

            // Episode
                var Episodes = $('.anime__details__episodes > a')
                // Set Current Ep
                Episodes[parseInt($('.breadcrumb__links > span')[0].innerHTML) -1].setAttribute("style", "background: #ffa500ab")

                // Set Ep Links
                Episodes.each(i => {
                    Episodes[i].setAttribute('href','/anime/'+id+"/episode/"+(i+1))
                })
            
            // Title
            $('.breadcrumb__links > a')[2].innerHTML = anime.title.english
            
            /*
                // Desc
                var desc = anime.description
                var char = 300
                desc = desc.slice(0, char) + (desc.length > char ? "..." : "");
                $('.anime__details__text > p')[0].innerHTML = desc

                // Ratings
                var aRating = Math.round((anime.averageScore / 100 * 5)*2)/2
                var ratings = $('.anime__details__rating > .rating a > i')
                var halfe = false

                ratings.each(rate => {

                    if (aRating > (rate + 1)){
                        ratings[rate].className = "fa fa-star"
                    } else if(aRating == (rate + 1)){
                        ratings[rate].className = "fa fa-star"
                        halfe = true
                    } else if(halfe != true) {
                        halfe = true
                        ratings[rate].className = "fa fa-star-half-o"
                    } else {
                        ratings[rate].className = "fa fa-star-o"
                    }
                })

                $('.anime__details__rating > span')[0].innerHTML = numFormatter(anime.stats.statusDistribution[2].amount) + " Votes"

                // Watches
                var watches = 0
                anime.stats.statusDistribution.every(stat => {
                    watches += stat.amount
                    console.log(watches)
                    return true
                })

                // Image
                $('.anime__details__pic')[0].setAttribute('data-setbg', anime.coverImage.extraLarge)
                
                // Type & Views
                $('.comment')[0].innerHTML = " " + anime.format                             // Type
                $('.view')[0].innerHTML = '<i class="fa fa-eye"></i> ' + numFormatter(watches) + '</div>'

                // Anime Details
                    var months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
                    // Left
                    var aGenre = ""
                    var count = 0
                    anime.genres.every(genre => {
                        if(count >= 3) {
                            aGenre += genre
                            return false
                        }
                        aGenre += genre + ", "
                        count++
                        return true
                    })

                    var leftOp = [
                        '<span>Type:</span>'+anime.format, 
                        '<span>Studios:</span>'+anime.studios.nodes[0].name,
                        '<span>Data aired:</span>'+ months[anime.startDate.month] + ", " + anime.startDate.year + " to " + (anime.endDate.year != undefined ? months[anime.endDate.month] + ", " + anime.endDate.year : "?"),
                        '<span>Status:</span>'+ capitalizeFirstLetter(anime.status.toLowerCase()),
                        '<span>Genre:</span>'+ aGenre
                    ]
                    
                    var left = $('.anime__details__widget > .row > .left > ul > li')
                    left.each(i => {
                        if(leftOp[i] != undefined) {
                            left[i].innerHTML = leftOp[i]
                        }
                    })
                    
                    // Right
                    var rightOp = [
                        '<span>Rating:</span>' + aRating + " / " + numFormatter(anime.stats.statusDistribution[2].amount),
                        '<span>Duration:</span>' + anime.duration + " min/ep",
                        '<span>Views:</span>' + numFormatter(watches)
                    ]

                    var right = $('.anime__details__widget > .row > .right > ul > li')
                    right.each(i => {
                        if(rightOp[i] != undefined) {
                            right[i].innerHTML = rightOp[i]
                        }
                    })

                // Check Episodes
                console.log("Anime Episode Streaming: "+anime.streamingEpisodes.length)
                if(anime.streamingEpisodes.length == 0) {
                    console.log("DELETE WATCH BUTTON")
                    $('.watch-btn')[0].remove()
                }
                */
            return true
        })
    })
}
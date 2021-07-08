/*  ---------------------------------------------------
    Description: Api Call for Anilist
    Author: Flumuffel
    Version: 1.0
    ---------------------------------------------------------  */    

function queryFetch(query, variables) {
    return fetch('https://graphql.anilist.co', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
        query: query,
        variables: variables
        })
    }).then(res => res.json())
}

function numFormatter(num) {
    if(num > 999 && num < 1000000){
        return (num/1000).toFixed(1) + 'K'; // convert to K for number from > 1000 < 1 million 
    }else if(num > 1000000){
        return (num/1000000).toFixed(1) + 'M'; // convert to M for number from > 1 million 
    }else if(num < 900){
        return num; // if value < 1000, nothing to do
    }
}

'use strict';

(function ($) {
    setTimeout(function() {
        console.log("Query apply system loaded")
        /*------------------
            Main Page
        --------------------*/
        var options = {
            'hero':{
                'input': $('.hero__slider')[0], 
                'query': querys['hero']
            }, 
            'popular':{
                'input': $('.popular__product > .row')[1],
                'query': querys['popular']
            }, 
            'recent':{
                'input': $('.recent__product > .row')[1], 
                'query': querys['recent']
            }
        }
        
        $('.set-query').each(function () {
            var setquery = $(this).data('setquery')
            var option = options[setquery];

            if(option == undefined || option == null) return

            console.log("Trigger setup for '"+setquery+"'")

            if(setquery != "hero") {
                showAnime(option.query, option.input, 8)
            } else {
                showHero(option.query, option.input, 4)
            }

        });
    
        console.log("Registered '.set-query' event!")
    })


})(jQuery);
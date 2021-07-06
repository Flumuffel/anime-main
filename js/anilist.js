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
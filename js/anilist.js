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
function getNews() {
    fetch('https://cors-anywhere.herokuapp.com//https://newsapi.org/v2/top-headlines?country=fr&apiKey=3b19d13356dd4e0cacaaf5785135891c', {headers: new Headers({"X-Requested-With":"bkbvk"})})
    // .then(a => a.json())
    // .then(response => {
    //     for(var i= 0; i<response.articles.length; i++) {
    //         document.getElementById("output").innerHTML += "<div style='padding-top: 20px;'><img style='float:left; width:150px;' src="+response.articles[i].urlToImage+"<h1>"+response.articles[i].title+"</h1>"+response.aricles[i].source.name+"<br>"+response.articles[i].description+"<a href="+response.articles[i].url+"target='_blank'>"+response.articles[i].url+"</a></div>";
    //     }
    // })
    console.log(fetch());
}
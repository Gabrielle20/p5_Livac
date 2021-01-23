function getNews() {
    fetch('http://cors-anywhere.herokuapp.com/newsapi.org/v2/top-headlines?country=france&apikey=3b19d13356dd4e0cacaaf5785135891c', {headers:new Headers({"X-Requested-With":"gbkreb"})})
    .then(a => a.json())
    .then(response => {
        for(var i= 0; i<response.articles.length; i++) {
            document.getElementById("output").innerHTML += "<div style='padding-top: 20px;'><img style='float:left; width:150px;' src="+response.articles[i].urlToImage+"<h1>"+response.articles[i].title+"</h1>"+response.aricles[i].source.name+"<br>"+response.articles[i].description+"<a href="+response.articles[i].url+"target='_blank'>"+response.articles[i].url+"</a></div>";
        }
    })
}
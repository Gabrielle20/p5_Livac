// async function getNews() {
//     const response = await fetch('https://newsapi.org/v2/top-headlines?country=fr&apiKey=3b19d13356dd4e0cacaaf5785135891c');
//     const data = await response.json();
//     console.log(data);
// }


async function getNews() {
    const response = await fetch('https://www.livac.com/api/news');
    conosle.log(response);
    const data = await response.json();
    console.log(data.articles);
}
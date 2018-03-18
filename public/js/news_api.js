var url = 'https://newsapi.org/v2/everything?'+
    'q=Fitness&'+
    'sortBy=popularity&' +
    'apiKey=e5d88efa8d1947a1811764f4f058a560';

$.getJSON(url,function (results) {
    console.table(results);

    $('#headImage1').attr('src', results.articles[5].urlToImage);
    $('#headline1').append(results.articles[5].title);
    $('#desc1').append(results.articles[5].description);
    $('#link1').attr('href', results.articles[5].url);
    $('#imageLink1').attr('href', results.articles[5].url);

    $('#headImage2').attr('src', results.articles[1].urlToImage);
    $('#headline2').append(results.articles[1].title);
    $('#desc2').append(results.articles[1].description);
    $('#link2').attr('href', results.articles[1].url);
    $('#imageLink2').attr('href', results.articles[1].url);

});
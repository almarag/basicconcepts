/******************************************
* Use Google Feed API to convert RSS to json
* Version 1.0 
* Created By: Russ Savage
* FreeAdWordsScripts.com
******************************************/
// Usage: var jsonData = convertRssToJson('http://www.cpsc.gov/en/Newsroom/CPSC-RSS-Feed/Recalls-RSS/');
function convertRssToJson(rssUrl) {
    var FEED_API_URL = "https://ajax.googleapis.com/ajax/services/feed/load?v=1.0&q="
    var url = FEED_API_URL + encodeURIComponent(rssUrl);
    var resp = UrlFetchApp.fetch(url);
    if (resp.getResponseCode() == 200) {
        return JSON.parse(resp.getContentText());
    } else {
        throw "An error occured while trying to parse: " + rssUrl;
    }
}
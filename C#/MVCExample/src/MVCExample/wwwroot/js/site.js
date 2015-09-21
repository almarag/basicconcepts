// Write your Javascript code.
var reutersTechRss = convertRssToJson('http://feeds.reuters.com/reuters/technologyNews?format=xml');
alert(reutersTechRss);

var app = angular.module('MyExampleApp', []);

app.controller('HelloController', function ($scope) {
    $scope.helloWorldText = 'Hello World';
    $scope.helloWorldParagraph = 'This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.';
    $scope.helloWorldLearnMoreBtn = 'Learn More';
});
var app = app || {};

app.DbViewList = Backbone.Collection.extend({
    model: app.DbView,
    url: '/views'
});

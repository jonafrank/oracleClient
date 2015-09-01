var app = app || {};

app.DbViewList = Backbone.Collection.extend({
    model: app.DbView,
    url: '/views',
    filterBy: function(prefix) {
        var newModels = [];
        this.forEach(function(model) {
            if (model.get('VIEW_NAME').indexOf(prefix) === 0) {
                newModels.push(model);
            }
        });
        this.add(newModels);
    }
});

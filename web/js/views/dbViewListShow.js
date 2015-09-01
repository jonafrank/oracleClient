var app = app || {};

app.DbViewListShow = Backbone.View.extend({
    el: '#viewslist_container',
    id: 'viewlist',
    template: Handlebars.compile($('#viewlist-template').html()),
    events: {
        'click #filter_button': 'filterViews',
        'submit #filter_form': 'filterViews',
        'click #reset_button': 'resetViews',
    },
    initialize: function () {
        this.collection = new app.DbViewList();
        this.collection.fetch({reset: true});
        this.render();
        this.listenTo(this.collection, 'reset', this.render);
        this.filterText = ''
    },
    render: function() {
        this.$el.html(this.template({
            views: this.collection.toJSON(),
            filter: this.filterText
        }));
    },
    filterViews: function() {
        var textfield = $('#viewNameField').val();
        if (!textfield.trim()) {
            return false;
        }
        this.filterText = textfield;
        var filter = this.collection.filter(function(model) {
            return model.get('VIEW_NAME').indexOf(textfield) === 0;
        })
        this.collection.reset();
        this.collection = new app.DbViewList(filter);
        this.listenTo(this.collection, 'reset', this.render);
        this.render();
    },
    resetViews: function() {
        this.filterText = '';
        this.collection.fetch({reset: true});
    }

})

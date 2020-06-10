var route = {
    add: function(url) {
        let title = $('title').text();
        history.pushState({}, title, url);
    }
};

var catalog = {
    selector: '#model-filter',
    container: '#list-container',
    init: function () {
      this.filter();  
    },
    filter: function() {
        var self = this;
        $(this.selector).submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'GET',
                data: $(this).serialize(),
                dataType: 'HTML',
                success: function(data) {
                    route.add(this.url);
                    $(self.container).html(data);
                }
            });
        });
    },
};

$(document).ready(function() {
    catalog.init();
});

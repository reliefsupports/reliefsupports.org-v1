$('.read-donation').on('click', function () {
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        url: '/donations/show/' + id,
        data: {}
    })
        .done(function(data) {
            var modal = $('#donationModal');

            if (data.isSuccess) {
                modal.find('#title').html('Donation #' + data.donation.id);
                modal.find('#name').html(data.donation.name);
                modal.find('#telephone').html(data.donation.telephone);
                modal.find('#address').html(data.donation.address);
                modal.find('#city').html(data.donation.city);
                modal.find('#donation').html(data.donation.donation);
                modal.find('#information').html(data.donation.information);
                modal.find('#added').html(data.donation.created_at);
            } else {
                modal.find('#title').html('Donation #' + data.donation.id);
                modal.find('.modal-body').html('<p>Something went wrong. Please try again.</p>');
            }
            modal.modal('show');
        });

});

$('.read-needs').on('click', function () {
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        url: '/needs/show/' + id,
        data: {}
    })
        .done(function(data) {
            var modal = $('#needsModal');

            if (data.isSuccess) {
                modal.find('#title').html('Need #' + data.need.id);
                modal.find('#name').html(data.need.name);
                modal.find('#telephone').html(data.need.telephone);
                modal.find('#address').html(data.need.address);
                modal.find('#city').html(data.need.city);
                modal.find('#needs').html(data.need.needs);
                modal.find('#heads').html(data.need.heads);
                modal.find('#added').html(data.need.created_at);
            } else {
                modal.find('#title').html('Need #' + data.need.id);
                modal.find('.modal-body').html('<p>Something went wrong. Please try again.</p>');
            }
            modal.modal('show');
        });

});

$('form').submit(function(e) {
    $('form').find('button[type=submit]').attr("disabled", true);
});
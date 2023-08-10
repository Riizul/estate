let nav = window.location.pathname.split('/')[1];
$('#nav').find('[data-id='+ nav +']').addClass('active')

$('.m-update-btn').click(function () {
    $('#propertyForm [type=submit]').click()
})
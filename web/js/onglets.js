
$(function() {
    $('#ongletsPlat').css('display', 'block');
    $('#ongletsPlat').click(function(event)
    {
        var actuel = event.target;
        if (!/li/i.test(actuel.nodeName) || actuel.className.indexOf('actif') > -1) {
            return;
        }
        $(actuel).addClass('actif').siblings().removeClass('actif');
        setDisplay();
    });
    function setDisplay() {
        var modeAffichage;
        $('#ongletsPlat li').each(function(rang)
        {
            modeAffichage = $(this).hasClass('actif') ? '' : 'none';
            $('.item').eq(rang).css('display', modeAffichage);
        });
    }
    setDisplay();
});

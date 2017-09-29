
if($('body').is('.cryptos')){
    var tl = new TimelineMax();
    tl.staggerTo(".row.overview", 0.4, {ease: Expo.ease, x: 0}, '0.05');
}

$(".cryptos-out").on('click' , function(event){
    event.preventDefault();
    var btn = this.getAttribute('href');
    var tl = new TimelineMax({
        onComplete: function(){
            window.location.href = btn;
        }
    });
    tl.staggerTo(".row.overview", 0.4, {ease: Expo.ease, x: "-100%"}, '0.05');
});

if($('body').is('.crypto')){
    var tl = new TimelineMax();
    tl.to("h1", 0.2, {ease: Expo.ease, opacity: 1, x: 0});
    tl.to(".body", 0.2, {ease: Expo.ease, opacity: 1, x: 0}, '0.1');
    tl.staggerTo(".endbody", 0.2, {ease: Expo.ease, opacity: 1, x: 0}, '0.6');
}

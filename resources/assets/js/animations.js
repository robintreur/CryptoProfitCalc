
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

$(".add-new_btn").on('click' , function(event){
    event.preventDefault();
    var btn = this.getAttribute('href');
    var tl = new TimelineMax({
        onComplete: function(){
            window.location.href = btn;
        }
    });
    tl.to(".add-new span", 0.1, {ease: Expo.ease, height: "100vh", bottom: 0});
    tl.to(".add-new span", 0.3, {ease: Expo.ease, background: "#34495e"});
    tl.to(".add-new span div", 0.3, {ease: Expo.ease, opacity: 0}, '0.3');
});

if($('body').is('.crypto')){
    var tl = new TimelineMax();
    tl.to("h1", 0.2, {ease: Expo.ease, opacity: 1, x: 0});
    tl.to(".body", 0.2, {ease: Expo.ease, opacity: 1, x: 0}, '0.1');
    tl.staggerTo(".endbody", 0.2, {ease: Expo.ease, opacity: 1, x: 0}, '0.6');
}

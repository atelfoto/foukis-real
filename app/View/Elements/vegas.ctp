<?php echo  $this->Html->scriptStart($options = array("inline"=>false)); ?>
if (navigator.userAgent.match(/(android|iphone|ipad|blackberry|symbian|symbianos|symbos|netfront|model-orange|javaplatform|iemobile|windows phone|samsung|htc|opera mobile|opera mobi|opera mini|presto|huawei|blazer|bolt|doris|fennec|gobrowser|iris|maemo browser|mib|cldc|minimo|semc-browser|skyfire|teashark|teleca|uzard|uzardweb|meego|nokia|bb10|playbook)/gi)) {
    if ( ((screen.width  >= 480) && (screen.height >= 800)) || ((screen.width  >= 800) && (screen.height >= 480)) || navigator.userAgent.match(/ipad/gi) ) {
     //  alert('tablette');
        $( function() {
            $('#home').vegas({
                slides: [
                {src: '/files/wallpaper/photo/desk_01.jpg' },
                ]
            });
        });
    } else  {
     //   alert('mobile');
        $( function() {
            $('.site-content').vegas({
                slides: [
                { src: '/files/wallpaper/photo/desk_03.jpg' },,
                ]
            });
        });
    }
} else {
   // alert('bureau');
    $( function() {

        $('#home').vegas({
            overlay: !0,
            transitionDuration: 4e3,
            delay: 1e4,
            slides:
            [{
                src: '/files/wallpaper/photo/desk_01.jpg',
                color: "#DBC9B3",
                transition: "fade2",
                transitionDuration: 1e4
            } ,

            ]
        });
    });
}

//{
//src: 'files/wallpaper/photo/desk_02.jpg',
//color: "#F6B700",
//transition: "zoomOut",
//transitionDuration: 8e3
//} , {
//src: 'files/wallpaper/photo/desk_03.jpg',
//transition: "swirlRight"
//},{
//src: 'files/wallpaper/photo/desk_04.jpg',
//animation: "random"
//},{
//src: 'files/wallpaper/photo/desk_01.jpg',
//animation: "kenburns",
//transition: "swirlLeft2" },

<?php  $this->Html->scriptEnd(); ?>

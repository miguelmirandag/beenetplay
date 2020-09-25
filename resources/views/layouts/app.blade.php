<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <style>
        #login{
            background-color: rgba(214, 241, 245, 0.199);
        }
    </style>

    <!-- UVP player -->
    <link rel="stylesheet" type="text/css"  href="{{ asset('content/global.css') }}"/>	
    <script type="text/javascript" src="{{ asset('java/FWDUVPlayer.js') }}"></script>
    <!-- plugin js Sweet alert para mensaje emergentes -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <!-- Setup video player -->
     @if (Cookie::get('status') == 200)
        <script type="text/javascript">
            FWDUVPUtils.onReady(function(){
                new FWDUVPlayer({		
                    //main settings
                    instanceName:"player1",
                    parentId:"myDiv",
                    playlistsId:"playlists",
                    mainFolderPath:"content",
                    skinPath:"minimal_skin_dark",
                    displayType:"responsive",
                    initializeOnlyWhenVisible:"no",
                    useVectorIcons:"no",
                    fillEntireVideoScreen:"no",
                    fillEntireposterScreen:"yes",
                    goFullScreenOnButtonPlay:"no",
                    playsinline:"yes",
                    privateVideoPassword:"428c841430ea18a70f7b06525d4b748a",
                    youtubeAPIKey:"",
                    useHEXColorsForSkin:"no",
                    normalHEXButtonsColor:"#666666",
                    useDeepLinking:"yes",
                    googleAnalyticsTrackingCode:"",
                    useResumeOnPlay:"no",
                    showPreloader:"yes",
                    preloaderBackgroundColor:"#000000",
                    preloaderFillColor:"#FFFFFF",
                    addKeyboardSupport:"yes",
                    autoScale:"yes",
                    showButtonsToolTip:"yes", 
                    stopVideoWhenPlayComplete:"no",
                    playAfterVideoStop:"no",
                    autoPlay:"yes",
                    loop:"no",
                    shuffle:"no",
                    showErrorInfo:"yes",
                    maxWidth:1400,
                    maxHeight:600,
                    buttonsToolTipHideDelay:1.5,
                    volume:.8,
                    backgroundColor:"#000000",
                    videoBackgroundColor:"#000000",
                    posterBackgroundColor:"#000000",
                    buttonsToolTipFontColor:"#5a5a5a",
                    //logo settings
                    showLogo:"yes",
                    hideLogoWithController:"yes",
                    logoPosition:"topRight",
                    logoLink:"http://www.webdesign-flash.ro/",
                    logoPath:"",
                    logoMargins:10,
                    //playlists/categories settings
                    showPlaylistsSearchInput:"yes",
                    usePlaylistsSelectBox:"yes",
                    showPlaylistsButtonAndPlaylists:"yes",
                    showPlaylistsByDefault:"no",
                    thumbnailSelectedType:"opacity",
                    startAtPlaylist:0,
                    buttonsMargins:15,
                    thumbnailMaxWidth:350, 
                    thumbnailMaxHeight:350,
                    horizontalSpaceBetweenThumbnails:40,
                    verticalSpaceBetweenThumbnails:40,
                    inputBackgroundColor:"#333333",
                    inputColor:"#999999",
                    //playlist settings
                    showPlaylistButtonAndPlaylist:"yes",
                    playlistPosition:"right",
                    showPlaylistByDefault:"yes",
                    showPlaylistName:"yes",
                    showSearchInput:"yes",
                    showLoopButton:"yes",
                    showShuffleButton:"yes",
                    showPlaylistOnFullScreen:"no",
                    showNextAndPrevButtons:"yes",
                    showThumbnail:"yes",
                    forceDisableDownloadButtonForFolder:"yes",
                    addMouseWheelSupport:"yes", 
                    startAtRandomVideo:"no",
                    stopAfterLastVideoHasPlayed:"no",
                    addScrollOnMouseMove:"no",
                    randomizePlaylist:'no',
                    folderVideoLabel:"VIDEO ",
                    playlistRightWidth:310,
                    playlistBottomHeight:380,
                    startAtVideo:0,
                    maxPlaylistItems:50,
                    thumbnailWidth:71,
                    thumbnailHeight:71,
                    spaceBetweenControllerAndPlaylist:1,
                    spaceBetweenThumbnails:1,
                    scrollbarOffestWidth:8,
                    scollbarSpeedSensitivity:.5,
                    playlistBackgroundColor:"#000000",
                    playlistNameColor:"#FFFFFF",
                    thumbnailNormalBackgroundColor:"#1b1b1b",
                    thumbnailHoverBackgroundColor:"#313131",
                    thumbnailDisabledBackgroundColor:"#272727",
                    searchInputBackgroundColor:"#000000",
                    searchInputColor:"#999999",
                    youtubeAndFolderVideoTitleColor:"#FFFFFF",
                    folderAudioSecondTitleColor:"#999999",
                    youtubeOwnerColor:"#888888",
                    youtubeDescriptionColor:"#888888",
                    mainSelectorBackgroundSelectedColor:"#FFFFFF",
                    mainSelectorTextNormalColor:"#FFFFFF",
                    mainSelectorTextSelectedColor:"#000000",
                    mainButtonBackgroundNormalColor:"#212021",
                    mainButtonBackgroundSelectedColor:"#FFFFFF",
                    mainButtonTextNormalColor:"#FFFFFF",
                    mainButtonTextSelectedColor:"#000000",
                    //controller settings
                    showController:"yes",
                    showControllerWhenVideoIsStopped:"yes",
                    showNextAndPrevButtonsInController:"no",
                    showRewindButton:"yes",
                    showPlaybackRateButton:"yes",
                    showVolumeButton:"yes",
                    showTime:"yes",
                    showQualityButton:"yes",
                    showInfoButton:"yes",
                    showDownloadButton:"yes",
                    showShareButton:"yes",
                    showEmbedButton:"yes",
                    showChromecastButton:"no",
                    showFullScreenButton:"yes",
                    disableVideoScrubber:"no",
                    showScrubberWhenControllerIsHidden:"yes",
                    showMainScrubberToolTipLabel:"yes",
                    showDefaultControllerForVimeo:"no",
                    repeatBackground:"yes",
                    controllerHeight:42,
                    controllerHideDelay:3,
                    startSpaceBetweenButtons:7,
                    spaceBetweenButtons:8,
                    scrubbersOffsetWidth:2,
                    mainScrubberOffestTop:14,
                    timeOffsetLeftWidth:5,
                    timeOffsetRightWidth:3,
                    timeOffsetTop:0,
                    volumeScrubberHeight:80,
                    volumeScrubberOfsetHeight:12,
                    timeColor:"#888888",
                    youtubeQualityButtonNormalColor:"#888888",
                    youtubeQualityButtonSelectedColor:"#FFFFFF",
                    scrubbersToolTipLabelBackgroundColor:"#FFFFFF",
                    scrubbersToolTipLabelFontColor:"#5a5a5a",
                    //advertisement on pause window
                    aopwTitle:"Advertisement",
                    aopwWidth:400,
                    aopwHeight:240,
                    aopwBorderSize:6,
                    aopwTitleColor:"#FFFFFF",
                    //subtitle
                    subtitlesOffLabel:"Subtitle off",
                    //popup add windows
                    showPopupAdsCloseButton:"yes",
                    //embed window and info window
                    embedAndInfoWindowCloseButtonMargins:15,
                    borderColor:"#333333",
                    mainLabelsColor:"#FFFFFF",
                    secondaryLabelsColor:"#a1a1a1",
                    shareAndEmbedTextColor:"#5a5a5a",
                    inputBackgroundColor:"#000000",
                    inputColor:"#FFFFFF",
                    //login
                    playIfLoggedIn:"no",
                    playIfLoggedInMessage:"Please <a href='https://google.com' target='_blank'>login</a> to play this video.",
                    //audio visualizer
                    audioVisualizerLinesColor:"#0099FF",
                    audioVisualizerCircleColor:"#FFFFFF",
                    //lightbox settings
                    closeLightBoxWhenPlayComplete:"no",
                    lightBoxBackgroundOpacity:.6,
                    lightBoxBackgroundColor:"#000000",
                    //sticky on scroll
                    stickyOnScroll:"no",
                    stickyOnScrollShowOpener:"yes",
                    stickyOnScrollWidth:"700",
                    stickyOnScrollHeight:"394",
                    //sticky display settings
                    showOpener:"yes",
                    showOpenerPlayPauseButton:"yes",
                    verticalPosition:"bottom",
                    horizontalPosition:"center",
                    showPlayerByDefault:"yes",
                    animatePlayer:"yes",
                    openerAlignment:"right",
                    mainBackgroundImagePath:"content/minimal_skin_dark/main-background.png",
                    openerEqulizerOffsetTop:-1,
                    openerEqulizerOffsetLeft:3,
                    offsetX:0,
                    offsetY:0,
                    //playback rate / speed
                    defaultPlaybackRate:1, //0.25, 0.5, 1, 1.25, 1.2, 2
                    //cuepoints
                    executeCuepointsOnlyOnce:"no",
                    //annotations
                    showAnnotationsPositionTool:"no",
                    //ads
                    openNewPageAtTheEndOfTheAds:"no",
                    playAdsOnlyOnce:"no",
                    adsButtonsPosition:"left",
                    skipToVideoText:"You can skip to video in: ",
                    skipToVideoButtonText:"Skip Ad",
                    adsTextNormalColor:"#888888",
                    adsTextSelectedColor:"#FFFFFF",
                    adsBorderNormalColor:"#666666",
                    adsBorderSelectedColor:"#FFFFFF",
                    //a to b loop
                    useAToB:"yes",
                    atbTimeBackgroundColor:"transparent",
                    atbTimeTextColorNormal:"#888888",
                    atbTimeTextColorSelected:"#FFFFFF",
                    atbButtonTextNormalColor:"#888888",
                    atbButtonTextSelectedColor:"#FFFFFF",
                    atbButtonBackgroundNormalColor:"#FFFFFF",
                    atbButtonBackgroundSelectedColor:"#000000",
                    //thumbnails preview
                    thumbnailsPreviewWidth:196,
                    thumbnailsPreviewHeight:110,
                    thumbnailsPreviewBackgroundColor:"#000000",
                    thumbnailsPreviewBorderColor:"#666",
                    thumbnailsPreviewLabelBackgroundColor:"#666",
                    thumbnailsPreviewLabelFontColor:"#FFF",
                    // context menu
                    showContextmenu:'yes',
                    showScriptDeveloper:"no",
                    contextMenuBackgroundColor:"#1f1f1f",
                    contextMenuBorderColor:"#1f1f1f",
                    contextMenuSpacerColor:"#333",
                    contextMenuItemNormalColor:"#888888",
                    contextMenuItemSelectedColor:"#FFFFFF",
                    contextMenuItemDisabledColor:"#444"
                });
            });
        </script>
    @endif
    
    
</head>
<body>
         
    @if (session()->has('flash'))
        <div class="alert alert-info">
            {{ session('flash') }}
        </div>    
    @endif

    @if (Cookie::get('status') == 200)
        <!-- Si es usuario valido agrega Navbar --> 
        @include('layouts.partials.navbar')
    @endif    
    
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    @include('sweet::alert')

</body>
</html>
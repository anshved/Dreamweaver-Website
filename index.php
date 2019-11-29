<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Dreamweaver Producitons</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
    <!--
      <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
    -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-126292348-2"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-126292348-2");
    </script>
  </head>

  <body>
    <style>
      html {
        box-sizing: border-box;
      }

      *,
      *:before,
      *:after {
        box-sizing: inherit;
      }

      body {
        margin: 0;
        padding: 0;
        display: flex;
        /* background: #7A419B; */
        min-height: 100vh;
        /* background: linear-gradient(135deg, #7c1599 0%,#921099 48%,#7e4ae8 100%); */
        background: #000;
        background-size: cover;
        align-items: center;
        justify-content: center;
      }

      .player {
        min-width: 100%;
        max-height: 100vh;
        border: 5px solid rgba(0, 0, 0, 0.2);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        position: relative;
        font-size: 0;
        overflow: hidden;
        margin: 0;
      }

      /* This css is only applied when fullscreen is active. */
      .player:fullscreen {
        max-width: none;
        width: 100%;
      }

      .player:-webkit-full-screen {
        max-width: none;
        width: 100%;
      }

      .player__video {
        width: 100%;
      }

      .player__button {
        background: none;
        border: 0;
        line-height: 1;
        color: white;
        text-align: center;
        outline: 0;
        padding: 0;
        cursor: pointer;
        max-width: 50px;
        /* font-size: 100%; */
      }

      .player__button:focus {
        border-color: #0097e6;
      }

      .player__slider {
        width: 10px;
        height: 30px;
      }

      .player__controls {
        display: flex;
        position: absolute;
        bottom: 0;
        width: 100%;
        transform: translateY(100%) translateY(-5px);
        transition: all 0.3s;
        flex-wrap: wrap;
        background: rgba(0, 0, 0, 0.1);
      }

      .player:hover .player__controls {
        transform: translateY(0);
      }

      .player:hover .progress {
        height: 10px;
      }

      .player__controls > * {
        flex: 1;
      }

      .progress {
        flex: 10;
        position: relative;
        display: flex;
        flex-basis: 100%;
        height: 5px;
        transition: height 0.3s;
        background: rgba(0, 0, 0, 0.5);
        cursor: ew-resize;
      }

      .progress__filled {
        width: 50%;
        background: #0097e6;
        flex: 0;
        flex-basis: 1%;
      }

      .progress2 {
        flex: 10;
        position: relative;
        display: flex;
        padding-top: 8px;
        height: 5px;
        transition: height 0.3s;
        background: rgba(255, 255, 255, 0.8);
        cursor: ew-resize;
        margin-top: 12px;
        flex-basis: 30%;
      }

      /* unholy css to style input type="range" */

      input[type="range"] {
        -webkit-appearance: none;
        background: transparent;
        width: 100%;
        margin: 0 5px;
      }

      input[type="range"]:focus {
        outline: none;
      }

      input[type="range"]::-webkit-slider-runnable-track {
        width: 100%;
        height: 8.4px;
        cursor: pointer;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, 0), 0 0 1px rgba(13, 13, 13, 0);
        background: rgba(255, 255, 255, 0.8);
        border-radius: 1.3px;
        border: 0.2px solid rgba(1, 1, 1, 0);
      }

      input[type="range"]::-webkit-slider-thumb {
        height: 15px;
        width: 15px;
        border-radius: 50px;
        background: #0097e6;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -3.5px;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
      }

      input[type="range"]:focus::-webkit-slider-runnable-track {
        background: #00a8ff;
      }

      input[type="range"]::-moz-range-track {
        width: 100%;
        height: 8.4px;
        cursor: pointer;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, 0), 0 0 1px rgba(13, 13, 13, 0);
        background: #ffffff;
        border-radius: 1.3px;
        border: 0.2px solid rgba(1, 1, 1, 0);
      }

      input[type="range"]::-moz-range-thumb {
        box-shadow: 0 0 0 rgba(0, 0, 0, 0), 0 0 0 rgba(13, 13, 13, 0);
        height: 15px;
        width: 15px;
        border-radius: 50px;
        background: #0097e6;
        cursor: pointer;
      }
    </style>

    <div class="player">
      <video
        class="player__video viewer"
        id="video1"
        autoplay
        poster="img/logo.jpeg"
        src="videos/Dream Weaver Productions.mp4"
      ></video>

      <div class="player__controls">
        <div class="progress"><div class="progress__filled"></div></div>
        <button class="player__button toggle" title="Toggle Play">▶</button>
        <h3>Dreamweaver</h3>
        <h3>Productions</h3>
        <h3>.co.in</h3>
        <input
          type="range"
          name="volume"
          class="player__slider"
          min="0"
          max="1"
          step="0.05"
          value="1"
        />
        <button class="player__button"><i class="fas fa-volume-up"></i></button>
        <button onclick="location.href='home.php'" class="player__button">
          SKIP
        </button>
      </div>
    </div>

    <script src="js/video.js"></script>
  </body>
</html>

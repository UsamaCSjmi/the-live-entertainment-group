<?php 
include_once("includes/header.php");
?>
<style>
    .profile-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px;
    }
    .profile-gallery {
        flex: 1;
        max-width: 100%;
        margin-bottom: 20px;
    }
    .profile-details {
        flex: 1;
        max-width: 100%;
        margin-left: 50px;
    }
    .profile-gallery img {
        width: 100%;
        height: auto;
    }
    .top-menu {
        display: flex;
        margin-right: auto;
        gap: 10px; /* Adjust gap here */
    }
    .carousel-control-prev, .carousel-control-next {
        width: 50px;
        height: 50px;
        background-color: rgba(128, 128, 128, 0.7);
        border-radius: 50%;
        top: 50%;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.2);
        transform: translateY(-50%);
    }
    .carousel-control-prev {
        left: -30px;
    }
    .carousel-control-next {
        right: -30px;
    }
    .thumbnail-wrapper {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }
    .thumbnail-wrapper img {
        width: 32%;
        height: auto;
    }
    @media (max-width: 767.98px) {
        .carousel-control-prev, .carousel-control-next {
            width: 30px;
            height: 30px;
        }
        .carousel-control-prev {
            left: -35px;
        }
        .carousel-control-next {
            right: -35px;
        }
        .thumbnail-wrapper img {
            width: 32%;
        }
    }
    
    /* header CSS */
    .header-tabs {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        border-bottom: 1px solid #ddd;
    }
    .header-tabs .nav-item {
        margin-right: 1px;
    }
    .header-tabs .nav-link {
        text-decoration: none;
        color: black;
        padding: 10px 15px;
        display: block;
        transition: background-color 0.3s, color 0.3s;
    }
    .header-tabs .nav-link:hover, .header-tabs .nav-link.active {
        background-color: black;
        color: white;
    }
    .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .header-actions .btn {
        margin-left: 10px;
    }
    .btn{
        background-color: #30706A;
        border-radius: 30px 30px 30px 30px;
        color: white;
        
    }
    #heart{
        background-color: antiquewhite;
        height: 40px;
        width: 40px;
        
        
    }
    th, td {
        
        border-collapse: collapse;
        padding: 15px; /* This will increase the height of the rows */
    }

    tr:nth-child(even) {
        background-color: #F3F3F3;
    }
    tr:nth-child(odd) {
        background-color: #FFFFFF;
    }

    /* scroll table csss */


    .table-container {
        max-height: 300px; /* Adjust the height as needed */
        overflow-y: auto;
        padding: 0px;
        
        
    }

    .table-container table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 8px 0; /* Add spacing between columns */
        table-layout: fixed; /* Ensure table layout is fixed */
    }

    .table-container th, td {
        padding: 15px;
        text-align: left;
    }

    .table-container tr:nth-child(even) {
        background-color: #F3F3F3;
    }

    .table-container th {
        background-color: #4CAF50;
        color: white;
    }


    /* Add scrollbar styles */
    .table-container::-webkit-scrollbar {
        width: 12px;

    }

    .table-container::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .table-container::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 10px;
        border: 3px solid #f1f1f1;
    }

    .table-container::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    

    /* Music player style  */

    
    .container {
        padding: 20px;   
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .music-row {
        display: flex;
        margin-bottom: 10px;
    }

    .music-box {
        display: flex;
        align-items: center;
        background-color: #f1f1f1;
        padding: 10px;
        flex-grow: 1;
        height: 50px;
        
    }

    .music-box:not(:last-child) {
        margin-right: 10px;
    }

    .music-box span {
        margin-left: 10px;
    }

    .play-button, .pause-button {
        background: none;
        border: none;
        font-size: 16px;
        cursor: pointer;
    }

    .play-button:focus, .pause-button:focus {
        outline: none;
    }

    .music-row:nth-child(2) .music-box {
        width: calc(50% - 5px);
    }

    .music-row:nth-child(3) .music-box {
        width: 100%;
    }
    
    /* video player css */
    .main-container{
        display: flex;
    }
    .video-container {
        
        background-color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70vh;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin: 10px;
        position: relative;
        width: 60%;
    }
    .video-container iframe {
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }
    .playlist-container {
        flex: 1;
        background-color: #ffffff;
        padding: 10px;
        overflow-y: auto;
        height: 70vh;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin: 10px;
        width: 40%;
    }
    .playlist-container h2 {
        margin-top: 0;
        text-align: center;
    }
    .search-bar {
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
    }
    .search-bar input {
        width: 80%;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid #ccc;
    }
    .video-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        cursor: pointer;
        padding: 10px;
        border-radius: 10px;
        transition: background-color 0.3s;
    }
    .video-item:hover {
        background-color: #f0f0f0;
    }
    .video-item img {
        width: 120px;
        height: 80px;
        margin-right: 10px;
        border-radius: 10px;
    }
    .video-item p {
        margin: 0;
    }
    .video-item.active {
        background-color: #d0d0d0;
    }
    .controls {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }
    .controls button,
    .controls input[type="range"] {
        margin: 0 10px;
    }
    
    .accordion-item:nth-child(even) .accordion-header {
    background-color: #F3F3F3;
    }
</style>
<div class="container ">
    <div class="row">
        <div class="col-md-6 profile-gallery">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo SITE_PATH?>assets/images/background.jpeg" class="d-block w-100" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo SITE_PATH?>assets/images/background.jpeg" class="d-block w-100" alt="Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo SITE_PATH?>assets/images/background.jpeg" class="d-block w-100" alt="Image 3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="thumbnail-wrapper">
                <img src="<?php echo SITE_PATH?>assets/images/background.jpeg" class="img-thumbnail" alt="Thumbnail 1">
                <img src="<?php echo SITE_PATH?>assets/images/background.jpeg" class="img-thumbnail" alt="Thumbnail 2">
                <img src="<?php echo SITE_PATH?>assets/images/background.jpeg" class="img-thumbnail" alt="Thumbnail 3">
            </div>
        </div>
        <div class="col-md-6 profile-details">
            <div class="top-menu">
                <p><i class="fas fa-music"></i> Music Genre</p>
                <p><i class="fas fa-map-marker-alt"></i> Location</p>
                <p><i class="fas fa-star"></i> 102</p>
                <a href="#" class="ml-auto"><i class="fas fa-share-alt"></i></a>
            </div>
            <h1>Band Name</h1>
            <button class="btn btn-primary mb-3">BOOK FROM £1,000</button>
            <ul>
                <li>Feature 1</li>
                <li>Feature 2</li>
                <li>Feature 3</li>
                <li>Feature 4</li>
            </ul>
            <button class="btn btn-secondary mb-3"><i class="fas fa-heart"></i> ADD TO SHORTLIST</button>
            <h2>About Band Name</h2>
            <p>This is a short paragraph used to describe the category and provide some SEO value.</p>
            <a href="#">Read More +</a>
        </div>
    </div>
</div>

                                <!-- hearder -->
<div class="container mt-5">
    <div class="header-tabs">
        <div class="nav">
            <a href="#" class="nav-item nav-link active">VIDEOS</a>
            <a href="#" class="nav-item nav-link">LISTEN</a>
            <a href="#" class="nav-item nav-link">SET LIST</a>
            <a href="#" class="nav-item nav-link">PERFORMANCE TIMES</a>
            <a href="#" class="nav-item nav-link">PACKAGE & EXTRAS</a>
            <a href="#" class="nav-item nav-link">REVIEWS</a>
        </div>
        <div class="header-actions">
        <a href="#"><i class="fa fa-heart" style=" color:#30706A"></i></a>
            
            <button class="btn">Enquire ></button>
        </div>
    </div>
</div>

<!-- video player -->

<div class="container mt-5">
<div class="main-container">
    <div class="video-container">
        <iframe id="main-video" src="https://www.youtube.com/embed/LK7-_dgAVQE" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="playlist-container">
        <h2>Watch Artist Name</h2>
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Search videos..." onkeyup="filterVideos()">
        </div>
        <div class="video-item" onclick="loadVideo('LK7-_dgAVQE', this)">
            <img src="https://i.ytimg.com/vi/LK7-_dgAVQE/hqdefault.jpg" alt="Tauba Tauba">
            <p>Tauba Tauba</p>
        </div>
        <div class="video-item" onclick="loadVideo('OzI9M74IfR0', this)">
            <img src="https://i.ytimg.com/vi/OzI9M74IfR0/hqdefault.jpg" alt="Yimmy Yimmy - Tayc">
            <p>Yimmy Yimmy - Tayc</p>
        </div>
        <div class="video-item" onclick="loadVideo('LK7-_dgAVQE', this)">
            <img src="https://i.ytimg.com/vi/LK7-_dgAVQE/hqdefault.jpg" alt="Tauba Tauba">
            <p>Tauba Tauba</p>
        </div>
        <div class="video-item" onclick="loadVideo('OzI9M74IfR0', this)">
            <img src="https://i.ytimg.com/vi/OzI9M74IfR0/hqdefault.jpg" alt="Yimmy Yimmy - Tayc">
            <p>Yimmy Yimmy - Tayc</p>
        </div>
        <div class="video-item" onclick="loadVideo('LK7-_dgAVQE', this)">
            <img src="https://i.ytimg.com/vi/LK7-_dgAVQE/hqdefault.jpg" alt="Tauba Tauba">
            <p>Tauba Tauba</p>
        </div>
        <div class="video-item" onclick="loadVideo('OzI9M74IfR0', this)">
            <img src="https://i.ytimg.com/vi/OzI9M74IfR0/hqdefault.jpg" alt="Yimmy Yimmy - Tayc">
            <p>Yimmy Yimmy - Tayc</p>
        </div>
        
        <!-- Add more video items as needed -->
    </div>

    <script>
        
    </script>
</div>

</div>

 <!-- music player -->
<div class="container mt-5">
<div class="container">
        <h2>Listen To Our Music</h2>
        <div class="music-row">
            <div class="music-box">
                <button class="play-button">&#9658;</button>
                <span>Song Title</span>
            </div>
            <div class="music-box">
                <button class="pause-button">&#10074;&#10074;</button>
                <span>Song Title</span>
            </div>
            <div class="music-box">
                <button class="play-button">&#9658;</button>
                <span>Song Title</span>
            </div>
        </div>
        <div class="music-row">
            <div class="music-box">
                <button class="play-button">&#9658;</button>
                <span>Song Title</span>
            </div>
            <div class="music-box">
                <button class="play-button">&#9658;</button>
                <span>Song Title</span>
            </div>
        </div>
        <div class="music-row">
            <div class="music-box">
                <button class="play-button">&#9658;</button>
                <span>Song Title</span>
            </div>
        </div>
    </div>

    
</div>


<!-- Our set List -->

<div class="container mt-5">
<h3 style=" text-align: center;"> Our Set List</h3>
<p  style=" text-align: center;" > Below is a list of some of our favourite songs to perform, filter through the categories or search to find your favourite songs. If there’s any music you wish for us to perform that are not listed, let us know and we’ll do our best to accommodate.</p>

<div class="table-container">
  <table>
    <tr>
      <td>Song Title 1</td>
      <td>Song Title 7</td>
    </tr>
    <tr>
      <td>Song Title 2</td>
      <td>Song Title 8</td>
    </tr>
    <tr>
      <td>Song Title 3</td>
      <td>Song Title 9</td>
    </tr>
    <tr>
      <td>Song Title 4</td>
      <td>Song Title 10</td>
    </tr>
    <tr>
      <td>Song Title 5</td>
      <td>Song Title 11</td>
    </tr>
    <tr>
      <td>Song Title 6</td>
      <td>Song Title 12</td>
    </tr>
    <tr>
      <td>Song Title 5</td>
      <td>Song Title 13</td>
    </tr>
    <tr>
      <td>Song Title 6</td>
      <td>Song Title 14</td>
    </tr>
  </table>
</div>
</div>

<!-- Performace time and Pricing -->
<div >
<div class="container mt-5" >
<h3 style=" text-align: center;">Performance Times and Pricing</h3>
<table style="width:100%">
  <tr>
    <th>Number of Sets</th>
    <th>Set Duration</th>
    <th>Price Form</th>
  </tr>
  <tr>
    <td>1</td>
    <td>45 minutes</td>
    <td>£450</td>
  </tr>
  <tr>
    <td>2</td>
    <td>45 minutes</td>
    <td>£800</td>
  </tr><tr>
    <td>2</td>
    <td>1 hour</td>
    <td>£1,100</td>
  </tr>
</table>

 </div>
</div>


<!-- Our package Section -->
<div class="container mt-5">
<h3 style=" text-align: center;"> Our Packages and Extras</h3>
<p  style=" text-align: center;" > Below is a list of some of our favourite songs to perform, filter through the categories or search to find your favourite songs. If there’s any music you wish for us to perform that are not listed, let us know and we’ll do our best to accommodate.</p>


<p>include as standard</p>

<table style="width:100%">
  <tr>
  <td><img src="<?php echo SITE_PATH?>assets/images/tick.png" alt="icon" style="width:50px; height:40px; vertical-align:middle; margin-right:10px;">2 x 45 minutes sets over a maximum 3 hour period</td>
  </tr>
  <tr>
  <td><img src="<?php echo SITE_PATH?>assets/images/tick.png" alt="icon" style="width:50px; height:40px; vertical-align:middle; margin-right:10px;">3 piece band</td>
  </tr>
  <tr>
  <td><img src="<?php echo SITE_PATH?>assets/images/tick.png" alt="icon" style="width:50px; height:40px; vertical-align:middle; margin-right:10px;">Professional DJ</td>
  </tr>
  <tr>
  <td><img src="<?php echo SITE_PATH?>assets/images/tick.png" alt="icon" style="width:50px; height:40px; vertical-align:middle; margin-right:10px;">Digital sound system</td>
  </tr>
  <tr>
  <td><img src="<?php echo SITE_PATH?>assets/images/tick.png" alt="icon" style="width:50px; height:40px; vertical-align:middle; margin-right:10px;">Tailour music for the events</td>
  </tr>
  <tr>
  <td><img src="<?php echo SITE_PATH?>assets/images/tick.png" alt="icon" style="width:50px; height:40px; vertical-align:middle; margin-right:10px;">4 x moving headlight</td>
  </tr>
</table>


<section class="site-section">
    <div class="container">
        <div class="accordion accordion-flush " id="faqs">
            
            <div class="accordion-item">
                <p class="accordion-header ">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-1" aria-expanded="false" aria-controls="faq-1">
                    Optional add-ons and extras
                    </button>
                </p>
                <div id="faq-1" class="accordion-collapse collapse" data-bs-parent="#faqs">
                    <div class="accordion-body">FAQ Answer 1 Title</div>
                </div>
            </div>
            <div class="accordion-item">
                <p class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-2" aria-expanded="false" aria-controls="faq-2">
                    4-piece band
                    </button>
                </p>
                <div id="faq-2" class="accordion-collapse collapse" data-bs-parent="#faqs">
                    <div class="accordion-body">FAQ Answer 2 Title</div>
                </div>
            </div>
            <div class="accordion-item">
                <p class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-3" aria-expanded="false" aria-controls="faq-3">
                    Acoustic Duo
                    </button>
                </p>
                <div id="faq-3" class="accordion-collapse collapse" data-bs-parent="#faqs">
                    <div class="accordion-body">FAQ Answer 3 Title</div>
                </div>
            </div>
            <div class="accordion-item">
                <p class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-4" aria-expanded="false" aria-controls="faq-4">
                    DJ Live
                    </button>
                </p>
                <div id="faq-4" class="accordion-collapse collapse" data-bs-parent="#faqs">
                    <div class="accordion-body">FAQ Answer 4 Title</div>
                </div>
            </div>
                
    </div>
</section>



</div>
<?php 
include_once("includes/footer.php");
?>
<script>
    $(document).ready(function() {
        $('.header-tabs .nav-link').on('click', function() {
            $('.header-tabs .nav-link').removeClass('active');
            $(this).addClass('active');
        });
    });

     // toggle the play pause button in music player

     $(document).ready(function() {
    $('.play-button, .pause-button').click(function() {
        if ($(this).hasClass('play-button')) {
            $(this).html('&#10074;&#10074;'); // Change to pause icon
            $(this).removeClass('play-button').addClass('pause-button');
        } else {
            $(this).html('&#9658;'); // Change to play icon
            $(this).removeClass('pause-button').addClass('play-button');
        }
    });
});
   
// video player script
function loadVideo(videoId, element) {
            document.getElementById('main-video').src = `https://www.youtube.com/embed/${videoId}`;
            // Highlight the active video
            const items = document.querySelectorAll('.video-item');
            items.forEach(item => item.classList.remove('active'));
            element.classList.add('active');
        }

        function filterVideos() {
            const input = document.getElementById('search-input').value.toLowerCase();
            const items = document.querySelectorAll('.video-item');
            items.forEach(item => {
                const title = item.querySelector('p').innerText.toLowerCase();
                if (title.includes(input)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }
</script>
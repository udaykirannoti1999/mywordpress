<?php
get_header();
?>

<!-- Custom Styles -->
<style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                    url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #f1f1f1;
    }

    .content-box {
        max-width: 600px;
        margin: 100px auto;
        background-color: rgba(255, 255, 255, 0.1);
        padding: 40px;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        text-align: center;
    }

    .content-box h1 {
        font-size: 36px;
        margin-bottom: 20px;
        color: #fff;
    }

    .content-box p {
        font-size: 18px;
        margin-bottom: 20px;
        color: #ddd;
    }

    .content-box button {
        padding: 12px 24px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .content-box button:hover {
        background-color: #1e7e34;
    }

    .gallery {
        max-width: 900px;
        margin: 50px auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 0 20px;
    }

    .gallery img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
    }
</style>

<!-- Page Content -->
<div class="content-box">
    <h1>Hello, WordPress!</h1>
    <p>Today's date is: <?php echo date('F j, Y'); ?></p>
    <button onclick="alert('Hello from WordPress!')">Click Me</button>
</div>

<!-- Gallery Section -->
<div class="gallery">
    <img src="https://images.unsplash.com/photo-1601758123927-196d5f1032c5?auto=format&fit=crop&w=800&q=80" alt="Cute Dog">
    <img src="https://images.unsplash.com/photo-1518717758536-85ae29035b6d?auto=format&fit=crop&w=800&q=80" alt="Golden Retriever">
    <img src="https://images.unsplash.com/photo-1581888227599-b5d9e7b1400e?auto=format&fit=crop&w=800&q=80" alt="Tropical Bird">
    <img src="https://images.unsplash.com/photo-1592194996308-7b43878e84a6?auto=format&fit=crop&w=800&q=80" alt="Colorful Parrot">
</div>


<?php
get_footer();
?>

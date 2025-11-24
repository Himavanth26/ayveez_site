<?php
// index.php — main site
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Ayveez Systems — Systems That Take Off</title>
<meta name="description" content="Ayveez Systems — scalable software, cloud and product engineering" />
<link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

<header class="site-header">
  <div class="container header-inner">
    <a class="brand" href="/">
      <img src="assets/images/Logo.png" alt="Ayveez logo" class="logo">
    </a>

    <nav class="main-nav">
      <a href="#jobs">Jobs</a>
      <a href="#life">Life at Ayveez</a>
      <a href="#services">Services</a>
      <a href="#contact" class="btn-ghost">Contact</a>
    </nav>
  </div>
</header>

<main>

<!-- HERO SECTION -->
<section class="hero">
  <div class="container hero-grid">
    <div class="hero-left">
      <h1>Welcome to careers at Ayveez</h1>
      <p class="lead">Where you’re empowered to combine your passions with our reach to engineer a smarter, more connected world.</p>

      <div class="hero-actions">
        <a href="#jobs" class="btn primary">Search jobs</a>
        <a href="#about" class="btn outline">Life at Ayveez</a>
      </div>

      <p class="watch-video"><button class="link-button">Watch video ▶</button></p>
    </div>

    <div class="hero-right">
      <div class="hero-card">
        <img src="assets/images/hero-right.jpg" alt="Team at Ayveez" />
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section id="services" class="container services">
  <h3>Our Services</h3>
  <div class="cards">
    <article class="card">
      <h4>Cloud & DevOps</h4>
      <p>Automated deployments, cost optimization and secure infrastructure.</p>
    </article>

    <article class="card">
      <h4>Platform Engineering</h4>
      <p>Resilient platforms with monitoring and disaster recovery.</p>
    </article>

    <article class="card">
      <h4>Custom Applications</h4>
      <p>Bespoke web & mobile applications using modern stacks.</p>
    </article>
  </div>
</section>

<!-- FEATURES -->
<section id="features" class="container features">
  <h3>Why choose Ayveez?</h3>
  <ul>
    <li>Engineering-first teams with product experience</li>
    <li>Security and compliance baked in</li>
    <li>Transparent delivery and reporting</li>
  </ul>
</section>

<!-- CONTACT FORM -->
<section id="contact" class="container contact">
  <h3>Contact Us</h3>
  <p>Fill the form and we'll get back to you within 1 business day.</p>

  <form id="contactForm" action="contact.php" method="post">
    <div class="form-row">
      <label for="name">Name</label>
      <input id="name" name="name" type="text" required>
    </div>

    <div class="form-row">
      <label for="email">Email</label>
      <input id="email" name="email" type="email" required>
    </div>

    <div class="form-row">
      <label for="company">Company (optional)</label>
      <input id="company" name="company" type="text">
    </div>

    <div class="form-row">
      <label for="message">Message</label>
      <textarea id="message" name="message" rows="5" required></textarea>
    </div>

    <div class="form-row form-actions">
      <button type="submit" class="btn primary">Send Message</button>
      <button type="reset" class="btn ghost">Reset</button>
    </div>
  </form>

  <div id="formStatus" class="form-status" aria-live="polite"></div>
</section>

</main>

<footer class="site-footer">
  <div class="container footer-inner">
    <div>© <?php echo date('Y'); ?> Ayveez Systems</div>
    <nav>
      <a href="#services">Services</a>
      <a href="#contact">Contact</a>
    </nav>
  </div>
</footer>

<script src="assets/js/main.js"></script>
</body>
</html>

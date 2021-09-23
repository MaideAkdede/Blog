<link rel="stylesheet" href="/app.css">
<title>My Blog</title>

<body>
<h1><?= $post->title; ?></h1>
<p>Published on: <?= $post->date; ?></p>
<p><?= $post->body; ?></p>
<a href="/">Go Back</a>
</body>

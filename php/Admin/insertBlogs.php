<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Blog</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif;}
    body {background:#f4f7fa; padding:40px;}
    .container {max-width:700px; background:#fff; margin:auto; padding:30px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
    h2 {text-align:center; margin-bottom:20px; color:#1e293b;}
    label {display:block; margin-bottom:6px; font-weight:600;}
    input, select, textarea {width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:8px;}
    textarea {resize:vertical; height:120px;}
    .btn {padding:10px 20px; background:#e10600; color:#fff; border:none; border-radius:8px; cursor:pointer;}
    .btn:hover {background:#b50500;}
    .back-link {display:inline-block; margin-bottom:15px; color:#1e293b; text-decoration:none; font-weight:600;}
    .back-link:hover {text-decoration:underline;}
  </style>
</head>
<body>
  <div class="container">
    <a href="showBlog.php" class="back-link">← Back to Blogs</a>
    <h2>Add New Blog</h2>

    <form action="../php_folder/insertBlog.php" method="POST" enctype="multipart/form-data">
      <label for="title">Blog Title</label>
      <input type="text" id="title" name="title" placeholder="Enter blog title" required>

      <label for="content">Content</label>
      <textarea id="content" name="content" placeholder="Write your blog content..." required></textarea>

      <label for="category">Category</label>
      <select id="category" name="category" required>
        <option value="">-- Select Category --</option>
        <option value="bike">Bike</option>
        <option value="rider">Rider</option>
      </select>

      <label for="author">Author</label>
      <input type="text" id="author" name="author" placeholder="Enter author name" required>

      <label for="status">Status</label>
      <select id="status" name="status" required>
        <option value="draft">Draft</option>
        <option value="published">Published</option>
      </select>

      <label for="featured_image">Featured Image</label>
      <input type="file" id="featured_image" name="featured_image" accept="image/*">

      <button type="submit" class="btn">Save Blog</button>
    </form>
  </div>
  <footer style="text-align:center; padding:15px 0; background:#1e293b; color:white; position:fixed; width:100%; bottom:0;">
    NepalTechGroup - Tech Company
  </footer>

</body>
</html>

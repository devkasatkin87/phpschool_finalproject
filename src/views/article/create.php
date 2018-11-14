<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<body>
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Create new article:</h2>
                </div>
        </div>
        <div class="row">
            <div class="col-md 9">
                <form>
                    <div class="form-group">
                        <label for="title">Add Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="text">Enter content</label>
                        <textarea class="form-control" id="text" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="topic">State</label>
                        <select id="topic" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>        
            </div>
        </div>
    </div>
</body>
<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

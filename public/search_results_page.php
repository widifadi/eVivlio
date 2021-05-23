<?php require_once("../templates/header.php"); ?>

<div class="container" style="margin-top: 100px;">
    <div id="search-page-search-container">
        <div class="input-group mb-3 page-search">
            <input type="text" class="form-control search-box search-input" id="searchpage-search-box"
                placeholder="Search a book or author" 
                aria-label="Search keyword" aria-describedby="search-button">
            <div class="input-group-append">
                <span class="input-group-text dark-search-button search-btn" id="searchpage-search">
                    <em class="fas fa-search"></em>
                </span>
            </div>
        </div>
    </div>

    <?php require_once("../src/Search/search_results.php"); ?>
</div>

<?php require_once("../templates/footer.php"); ?>

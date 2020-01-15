<!DOCTYPE html>
<html lang="ja">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Occupy Me</title>

    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="彼氏,彼女,恋人,募集,応援,アフィリエイト,プログラム" />
    <meta name="description" content="Occupy Meは彼氏・彼女を探している人を応援している組織です">
    <meta name="author" content="imai" >
    <meta property="og:site_name" content="Occupy Me" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= current_url(); ?>" />
    <meta property="og:title" content="Occupy Me" />
    <meta property="og:description" content="Occupy Meは彼氏・彼女を探している人を応援している組織です" />
    <meta property="og:image" content="https://occupyme.maitakajp.com/images/logo/logo_3.png" />
    <meta property="og:image:alt" content="Occupy Me" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/lib/zebradialog/css/default/zebra_dialog.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/lib/zebradialog/js/zebra_dialog.js"></script>

    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon">

<?php if (ENVIRONMENT == 'production') : ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147235219-3"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-147235219-3');
</script>
<script data-ad-client="ca-pub-7141035308268908" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script>
    jQuery(window).load(function() {
        setInterval(function() {
            jQuery('ins.adsbygoogle').each(function() {
                (adsbygoogle = window.adsbygoogle || []).push({});
            });
        }, 100);
    });
</script>
<?php endif; ?>

</head>

<?= $content_header; ?>
<?= $content_body; ?>
<?= $content_footer; ?>

</body>
</html>

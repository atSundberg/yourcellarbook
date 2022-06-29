<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cellar Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.0/showdown.min.js"></script>

  <!--load all Font Awesome styles -->
  <link href="assets/css/all.css" rel="stylesheet">

<script >
  function MyComp() {
    return {
      selPage:'home', 
      bodyData : '',
      dataMD : '',
      cnvToHtml() {
//        console.log("cnvToHtml:" + this.selPage + ":" + this.dataMD);
        var converter = new showdown.Converter();
        return converter.makeHtml(this.dataMD);   
      },
      selectPage() {
        if ( '' == this.selPage ) {
          return 'home';
        }
        if ( 'privpol' == this.selPage ) {
          return 'privpolicy';
        }
        if ( 'terms' == this.selPage ) {
          return 'termsandcond';
        }
        return this.selPage;
      },
      fetchInfo() {
        fetch('./api/info/' + this.selectPage()).then((response) => response.json()).then(json => {
          this.dataMD = json.data
//          console.log(this.dataMD)
          this.bodyData = this.cnvToHtml();
        }).catch(function () {
          console.err("Problem fetching!")
        })
      }    
    }
  }
</script>

  </head>
<body x-data="MyComp()" x-init="$watch('selPage', val => fetchInfo()); fetchInfo()">
<?php echo $header_content; ?>
<?php echo $body_content; ?>
<?php echo $footer_content; ?>

<!-- 
<p>
  selPage:<span x-text="selPage">p-span</span>
  , bodyData:<span x-text="bodyData">p-span</span>
  <br />dataMD:<span x-text="dataMD">p-span</span>
</p>
-->
</body>
</html>
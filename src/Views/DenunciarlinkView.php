<?php
namespace Views;

class DenunciarlinkView
{
  private $fileName;

  public function __construct($fileName)
  {
      $this->fileName = $fileName;
  }

  public function render()
  {
  include('Pages/'.$this->fileName.'.php');
  }

  public static function render_link($hash)
  {
    $hash = $hash;
    $print = "<script>
    let form = document.getElementsByClassName('form')[0];

    let id = '$hash';

    let p = document.createElement('p');

    p.innerText = id;

    form.appendChild(p);
    </script>";
    echo $print;

  }
}

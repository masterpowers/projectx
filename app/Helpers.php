<?php

function renderNode($node) {
  if( $node->isLeaf() ) {
    return '<li><a href="'. route('guest::category@show', ["category" => $node->slug]) .'" class="waves-effect waves-light waves-red lighten-5 teal-text truncate"><i class="material-icons right" style="padding-right:20px;">link</i>' .$node->name. '</a></li>';
  } else {
    $html = '<li><a class="toggle truncate" href="javascript:void(0);"><i class="material-icons right" style="padding-right:25px;">add</i>' .$node->name. '</a>';

    $html .= '<ul class="inner">';

    foreach($node->children as $child)
      $html .= renderNode($child);

    $html .= '</ul>';

    $html .= '</li>';
  }

  return $html;
}
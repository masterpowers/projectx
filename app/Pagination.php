<?php namespace App;

use Landish\Pagination\Materialize;

class Pagination extends Materialize {
	/**
     * Available page wrapper HTML.
     *
     * @var string
     */
    protected $availablePageWrapper = '<li class="waves-effect"><a href="%s" class="teal-text text-lighten-2">%s</a></li>';

    /**
     * Get active page wrapper HTML.
     * Add MaterializeCss Color Class
     *
     * @var string
     */
    protected $activePageWrapper = '<li class="active teal lighten-2"><a href="#!">%s</a></li>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<li class="disabled"><a href="#!" class="blue-text text-lighten-4">%s</a></li>';

    /**
     * Previous button text.
     *
     * @var string
     */
    protected $previousButtonText = '<i class="material-icons">keyboard_arrow_left</i>';

    /**
     * Next button text.
     *
     * @var string
     */
    protected $nextButtonText = '<i class="material-icons">keyboard_arrow_right</i>';

}
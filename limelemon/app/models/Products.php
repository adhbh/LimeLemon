<?php

    class Products extends Eloquent
    {
		protected $fillable = array('id', 'name', 'description', 'base_price');
    }
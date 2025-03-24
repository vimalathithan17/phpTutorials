<?php
function createElement($tag,$content){
    return createOpeningTag($tag).$content.createClosingTag($tag);
}
function createOpeningTag($tag){
    return "<$tag>";
}
function createClosingTag($tag){
    return "</$tag>";
}
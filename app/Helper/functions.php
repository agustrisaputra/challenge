<?php

function empty_object($statusCode = 200) {
    return response()->json(['data' => new stdClass()], $statusCode);
}

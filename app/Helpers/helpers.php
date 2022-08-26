<?php

use Carbon\Carbon;

/**
 * Base Url For Image From Drovox Dashboard Project
 */
if (!function_exists('FileBaseURl')) {
	function FileBaseURl($file)
	{
		return env('APP_FILE_URL') . $file;
	}
}
/**
 * Get list of languages
 */

if (!function_exists('languages')) {
	function languages()
	{
		$languages = App\Models\Language::all();
		return $languages;
	}
}
/**
 * upload64
 */
if (!function_exists('upload64')) {
	function upload64($file, $path)
	{
		$baseDir = 'uploads/' . $path;

		$name = sha1(time() . $file->getClientOriginalName());
		$extension = $file->getClientOriginalExtension();
		$fileName = "{$name}.{$extension}";

		$file->move(public_path() . '/' . $baseDir, $fileName);

		return "{$baseDir}/{$fileName}";
	}
}
/**
 * Upload
 */
if (!function_exists('upload')) {
	function upload($file, $path)
	{
		$baseDir = 'uploads/' . $path;

		$name = sha1(time() . $file->getClientOriginalName());
		$extension = $file->getClientOriginalExtension();
		$fileName = "{$name}.{$extension}";

		$file->move(public_path() . '/' . $baseDir, $fileName);

		return "{$baseDir}/{$fileName}";
	}
}

/**
 * Generate Code
 */
if (!function_exists('generateRandomCode')) {
	function generateRandomCode($string)
	{
		return $string .'-'. substr(md5(microtime()), rand(0, 26), 5);
	}
}

/**
 * Generate Code
 */
if (!function_exists('age')) {
	function age($date)
	{
		return  Carbon::parse($date)->diff(Carbon::now())->format('%y years');
	}
}

function formatBytes($size, $precision = 2)
{
	$base = log((float) $size, 1024);
	$suffixes = ['Byte', 'K', 'M', 'G', 'T'];

	return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}
<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Enums\Unit;
use Illuminate\Bus\Queueable;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\AlignPosition;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $w;
    private $h;
    private $fileName;
    private $path;

    /**
     * Create a new job instance.
     * @return void 
     */
    public function __construct($filePath , $w , $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h =$h;
        
    }

    /**
     * Execute the job.
     * @return void
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        $croppedImage = Image::load($srcPath)
                        ->crop($w, $h, CropPosition::Center)
                        ->watermark('resources/img/mark.png',
                                AlignPosition::Center,
                                paddingX: 10,
                                paddingY: 10,
                                paddingUnit: Unit::Percent,
                                width: 100,
                                widthUnit: Unit::Percent,
                                height: 50,
                                heightUnit: Unit::Percent,
                                alpha: 30)
                        ->save($destPath);
    }
}

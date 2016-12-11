# Image Processing Queue

An alternative to on-the-fly image processing. Like on-the-fly image processing, it allows theme developers to define image sizes specifically for certain contexts to greatly reduce the number of resized images and hence reduce disk space usage. The difference from on-the-fly image processing is that when an image size doesn't exist yet, it immediately returns the closest size as the `src` and all available sizes of the same aspect ratio in the `srcset` and adds the image size to a queue to be generated in the background as server resources allow.
  
## Installation

Clone repository to your WordPress plugins folder and run `composer install`

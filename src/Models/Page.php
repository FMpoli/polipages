<?php

namespace Detit\Polipages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;
    protected $table = 'polipages_pages';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'meta_title',
        'meta_description',
        'is_published',
    ];

    public $translatable = [
        'title',
        'slug',
        'content',
        'description',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'content' => 'array',
        'title' => 'array',
        'slug' => 'array',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'published' => 'boolean',
    ];

    public function getContentAttribute($value)
    {
        $content = is_string($value) ? json_decode($value, true) : $value;
        if($content === null) {
            return [];
        }


        foreach ($content as $lang => $blocks) {
            if (is_array($blocks)) {
                foreach ($blocks as $key => $block) {
                    if (isset($block['data']) && is_array($block['data'])) {
                        // Normalizzazione del campo 'media'
                        if (isset($block['data']['media'])) {
                            $content[$lang][$key]['data']['media'] = $this->normalizeMedia($block['data']['media']);
                        }
                        // Normalizzazione del campo 'buttons'
                        if (isset($block['data']['buttons'])) {
                            $content[$lang][$key]['data']['buttons'] = $this->normalizeButtons($block['data']['buttons']);
                        }
                    }
                }
            }
        }

        return $content;
    }

    private function normalizeMedia($media)
    {
        if (is_array($media)) {
            return reset($media); // Ritorna il primo elemento dell'array
        }
        return $media; // Ritorna direttamente se è già una stringa
    }

    private function normalizeButtons($buttons)
    {
        if (is_array($buttons)) {
            foreach ($buttons as $button) {
                return $button; // Ritorna il primo elemento dell'array
            }
        }
        return $buttons; // Ritorna direttamente se è già una stringa
    }

}

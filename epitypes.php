<?php

/**
 * Epitypes - Epistemological File Classification
 * 
 * Classifies files by nature (pages/assets), type, and format
 * Based on semantic hierarchy rather than just technical extensions
 */
class epitypes {
    
    private $data;
    
    public function __construct() {
        $this->loadData();
    }
    
    /**
     * Load epitypes data from JSON
     */
    private function loadData() {
        $jsonPath = __DIR__ . '/epitypes.json';
        if (!file_exists($jsonPath)) {
            throw new Exception("Epitypes data file not found: $jsonPath");
        }
        
        $this->data = json_decode(file_get_contents($jsonPath), true);
        if (!$this->data) {
            throw new Exception("Failed to parse epitypes.json");
        }
    }
    
    /**
     * Classify a file path into epistemological hierarchy
     * 
     * @param string $path File path
     * @return array Three-level classification [nature, type, format]
     */
    public function classify($path) {
        $itemName = basename($path);
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        
        // Check ignored items
        if (in_array($itemName, $this->data['ignored']['items'])) {
            return ['ignored'];
        }
        
        // Check if directory
        if (is_dir($path)) {
            return ['folder'];
        }
        
        // Check if file exists
        if (!is_file($path)) {
            return ['ignored'];
        }
        
        // Search in pages
        foreach ($this->data['pages']['types'] as $type => $typeData) {
            foreach ($typeData['formats'] as $format => $formatData) {
                if (in_array($extension, $formatData['extensions'])) {
                    return ['page', $type, $format];
                }
            }
        }
        
        // Search in assets
        foreach ($this->data['assets']['types'] as $type => $typeData) {
            foreach ($typeData['formats'] as $format => $formatData) {
                if (in_array($extension, $formatData['extensions'])) {
                    return ['asset', $type, $format];
                }
            }
        }
        
        // Unknown extension
        return ['unknown', $extension];
    }
    
    /**
     * Check if file is a page (editable content)
     * 
     * @param string $path File path
     * @return bool
     */
    public function isPage($path) {
        $result = $this->classify($path);
        return $result[0] === 'page';
    }
    
    /**
     * Check if file is an asset (consumable content)
     * 
     * @param string $path File path
     * @return bool
     */
    public function isAsset($path) {
        $result = $this->classify($path);
        return $result[0] === 'asset';
    }
    
    /**
     * Check if file is a text file that should have content included
     * Legacy compatibility for existing codebase
     * 
     * @param string $path File path
     * @return bool
     */
    public function isTextFile($path) {
        $result = $this->classify($path);
        
        // All pages are text files
        if ($result[0] === 'page') {
            return true;
        }
        
        // Some assets might be text-based (like SVG)
        if ($result[0] === 'asset' && isset($result[2])) {
            $textAssetFormats = ['svg']; // Add other text-based asset formats
            return in_array($result[2], $textAssetFormats);
        }
        
        return false;
    }
    
    /**
     * Get all extensions for a specific nature and type
     * 
     * @param string $nature 'pages' or 'assets'
     * @param string $type Type within the nature
     * @return array List of extensions
     */
    public function getExtensions($nature, $type = null) {
        if (!isset($this->data[$nature]['types'])) {
            return [];
        }
        
        $extensions = [];
        
        if ($type) {
            // Get extensions for specific type
            if (isset($this->data[$nature]['types'][$type]['formats'])) {
                foreach ($this->data[$nature]['types'][$type]['formats'] as $format => $formatData) {
                    $extensions = array_merge($extensions, $formatData['extensions']);
                }
            }
        } else {
            // Get all extensions for this nature
            foreach ($this->data[$nature]['types'] as $typeData) {
                foreach ($typeData['formats'] as $format => $formatData) {
                    $extensions = array_merge($extensions, $formatData['extensions']);
                }
            }
        }
        
        return array_unique($extensions);
    }
    
    /**
     * Get raw epitypes data
     * 
     * @return array Complete epitypes data structure
     */
    public function getData() {
        return $this->data;
    }
}
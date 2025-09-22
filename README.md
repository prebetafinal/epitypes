# Epitypes

Semantic file classification for content management systems.

## Problem

File systems store everything as bytes with extensions. Human brains organize content by purpose and meaning. This repo is a tree  where file ypes (.jpg, .pdf, .mp3) are the leaves. While human perception/grouping is the branch system.

## Solution

Epitypes are file types classified by nature and purpose.  Three fundamental categories:

- **Pages** - files you edit (markdown, code, data, config)
- **Assets** - files you consume (media, documents, archives, materials)
- **Ignore** - files you don't need in most cases (.DS_Store etc.)

## Structure

```json
{
  "pages": {
    "content": ["md", "html", "txt"],     // Human-readable stuff
    "code": ["js", "py", "php"],        // Programming files  
    "data": ["json", "yaml", "csv"],    // Structured data
    "config": ["ini", "env", "conf"]    // Settings
  },
  "assets": {
    "media": ["jpg", "mp3", "mp4"],     // Images/audio/video
    "documents": ["pdf", "docx"],       // Published docs
    "archives": ["zip", "tar", "7z"],   // Compressed files
    "materials": ["psd", "svg", "flp"]  // Source files
  }
}
```


Unknown Files

Files not listed in epitypes automatically fall into an "other" group. This handles cases like executables (.exe), system binaries, and all other formats non-relevant to content management.

## License

MIT
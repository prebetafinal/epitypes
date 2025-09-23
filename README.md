# Epitypes

Semantic file classification for content management systems.

## Problem

File systems store everything as bytes with extensions. Human brains organize content by purpose and meaning. This repo is a tree  where file ypes (.jpg, .pdf, .mp3) are the leaves. While human perception/grouping is the branch system.

## Solution

Epitypes are file types classified by nature and purpose.  Three fundamental categories:

- **Pages** - files you edit (markdown, code, data, config)
- **Assets** - files you consume (media, documents, archives, materials)
- **Ignore** - files you don't need in most cases (.DS_Store etc.)

## Structure (abbreviated for clarity)

```json
{
  "pages": { 
    "description": "Editable content files that can be opened in text editors",
    "formats": {
      "raw": ["txt", "text", "log"],     
      "markup": ["html", "md", "xml"],    
      "code": ["js", "py", "php"],        
      "data": ["json", "yaml", "csv"],    
      "config": ["ini", "env", "conf"]    
    }
  },
  "assets": { 
    "description": "Files for consumption, reference, or use as materials",
      "formats": {
        "media": ["jpg", "mp3", "mp4"],     
        "documents": ["pdf", "docx"],       
        "archives": ["zip", "tar", "7z"],   
        "materials": ["psd", "3ds", "midi"]  
      } 
  },
  "ignored": {
    "description": "Items to ignore even during file scanning",
    "items": [".git", ".DS_Store", "Thumbs.db", ".svn", ".hg", ".epitome", ".gitignore", "node_modules", ".vscode", ".idea"]
  }
}
```

## Epistemic Foundation
**Layer 1 (Ontological)**: `pages` vs `assets` 
- Pure human conceptual distinction: "What I work on" vs "What I consume"
- Domain-Driven Design level - reflects user mental models
- Never changes because it's fundamental to human cognition

**Layer 2 (Categorical)**: `raw`, `markup`, `code`, `data`, `config`
- Human-computer bridge layer - how humans categorize information processing
- Reflects both human logic (raw text vs structured) and computational needs
- Stable because these are fundamental information categories

**Layer 3 (Technical)**: `markdown`, `javascript`, `json`, etc.
- Pure technical implementation details
- Machine-readable yet human-understandable
- Most volatile layer - formats come and go

Each level and node  tends to be linguistically sound:
- **Raw** = unstructured human thought
- **Markup** = structured human expression  
- **Code** = human instructions for machines
- **Data** = structured information
- **Config** = system parameters

This creates an epistemic hierarchy: pure human cognition → hybrid human-machine categories → technical specifications. 

The 'page' metaphor works perfectly as long as it's presented as a page in the UI, regardless of its deeper nature, and this terminology is widely accepted in the domain.

This classification is experimental so any income/feedback is welcome.

Unknown Files

Files not listed in epitypes automatically fall into an "other" group. Things like executables (.exe), system binaries, and other non-relevant to content management formats. These cases should be handled by algorythms accordingly. 

## License

MIT

import os
import zipfile

def zip_project(source_dir, output_filename):
    # Files/Folders to EXCLUDE
    excludes = {
        'node_modules', '.git', '.gemini', '.vscode', '.idea',
        'tests', 'storage/framework/cache', 'storage/framework/views',
        'deploy_script.py', 'deployment_package.zip', 'stuvalley_deploy.zip'
    }
    
    # Extensions to exclude
    exclude_exts = {'.log', '.tmp', '.zip'}

    with zipfile.ZipFile(output_filename, 'w', zipfile.ZIP_DEFLATED) as zipf:
        for root, dirs, files in os.walk(source_dir):
            # Modify dirs in-place to skip excluded directories
            dirs[:] = [d for d in dirs if d not in excludes]
            
            for file in files:
                file_path = os.path.join(root, file)
                
                # relative path for archive
                arcname = os.path.relpath(file_path, source_dir)
                
                # Skip if file extension is excluded (unless it's important)
                if any(file.endswith(ext) for ext in exclude_exts):
                     continue
                     
                # Add to zip
                print(f"Adding: {arcname}")
                zipf.write(file_path, arcname)

if __name__ == "__main__":
    source = r"c:\xampp\htdocs\stuvalley.com-main\stuvalley.com-main"
    output = os.path.join(source, "stuvalley_deploy.zip")
    print("Creating deployment zip...")
    zip_project(source, output)
    print(f"Done! Created {output}")

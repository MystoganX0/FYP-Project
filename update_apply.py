import os

file_path = r"c:\laragon\www\SD\resources\views\apply.blade.php"

with open(file_path, 'r', encoding='utf-8') as f:
    lines = f.readlines()

# Target lines 641-649 (1-indexed) -> 640-649 (0-indexed)
start_index = 640
end_index = 649 

# Check if line 640 contains "resultsDiv.innerHTML"
if "resultsDiv.innerHTML" not in lines[start_index]:
    print(f"Error: Line {start_index+1} does not match expected content: {lines[start_index]}")
    exit(1)

new_content = """                resultsDiv.innerHTML = messages.map((msg, index) => {
                    const isSuccess = msg.type === "success";
                    const isError = msg.type === "error";

                    const bgColor = isSuccess ? "bg-green-50 border-green-200" : (isError ? "bg-red-50 border-red-200" :
                        "bg-blue-50 border-blue-200");
                    const textColor = isSuccess ? "text-green-800" : (isError ? "text-red-800" : "text-blue-800");
                    const iconColor = isSuccess ? "text-green-600" : (isError ? "text-red-600" : "text-blue-600");

                    // Icons (SVG)
                    const iconSvg = isSuccess ?
                        `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>` :
                        (isError ?
                            `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>` :
                            `<svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`
                        );

                    return `
                        <div class="flex items-center gap-3 p-4 rounded-xl border ${bgColor} ${textColor} shadow-sm transition-all duration-300 hover:shadow-md animate-fadeIn" style="animation-delay: ${index * 100}ms">
                            <div class="flex-shrink-0 ${iconColor}">
                                ${iconSvg}
                            </div>
                            <span class="font-medium text-sm">${msg.text}</span>
                        </div>
                    `;
                }).join("");
"""

lines[start_index:end_index] = [new_content]

with open(file_path, 'w', encoding='utf-8') as f:
    f.writelines(lines)

print("Successfully updated file.")

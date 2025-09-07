#!/bin/bash

# 双仓库同步脚本
# 用于同时推送代码到阿里云Codeup和GitHub

echo "开始同步到两个远程仓库..."

# 推送到阿里云Codeup (origin)
echo "推送到阿里云Codeup..."
git push origin main

if [ $? -eq 0 ]; then
    echo "✅ 阿里云Codeup推送成功"
else
    echo "❌ 阿里云Codeup推送失败"
fi

# 推送到GitHub
echo "推送到GitHub..."
git push github main

if [ $? -eq 0 ]; then
    echo "✅ GitHub推送成功"
else
    echo "❌ GitHub推送失败"
fi

echo "同步完成！"

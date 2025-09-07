# 双仓库同步设置说明

## 当前配置

你的项目现在已经配置了两个远程仓库：

1. **阿里云Codeup** (origin): `git@codeup.aliyun.com:68831ce6349fe2cce7f6dc59/wp/haoyu-theme.git`
2. **GitHub** (github): `git@github.com:wp-lover-hy/haoyu-theme.git`

## 使用方法

### 方法1: 使用同步脚本（推荐）

运行同步脚本，自动推送到两个仓库：

```bash
./sync-repos.sh
```

### 方法2: 手动推送

分别推送到两个仓库：

```bash
# 推送到阿里云Codeup
git push origin main

# 推送到GitHub
git push github main
```

### 方法3: 同时推送到所有远程仓库

```bash
git push --all origin
git push --all github
```

## 从远程仓库拉取

### 从阿里云Codeup拉取
```bash
git pull origin main
```

### 从GitHub拉取
```bash
git pull github main
```

## 注意事项

1. **SSH密钥**: 已配置SSH方式连接GitHub，无需输入用户名密码
2. **冲突处理**: 如果两个仓库有不同的提交历史，可能需要先合并或解决冲突
3. **认证状态**: SSH连接已测试正常，可以正常推送和拉取

## 查看远程仓库状态

```bash
# 查看所有远程仓库
git remote -v

# 查看远程分支
git branch -r
```

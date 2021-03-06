if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[FK_Replys_Topics]') and OBJECTPROPERTY(id, N'IsForeignKey') = 1)
ALTER TABLE [dbo].[UploaderReplys] DROP CONSTRAINT FK_Replys_Topics
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[FK_TopicAttachments_Topics]') and OBJECTPROPERTY(id, N'IsForeignKey') = 1)
ALTER TABLE [dbo].[UploaderTopicAttachments] DROP CONSTRAINT FK_TopicAttachments_Topics
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[FK_Files_Users]') and OBJECTPROPERTY(id, N'IsForeignKey') = 1)
ALTER TABLE [dbo].[UploaderFiles] DROP CONSTRAINT FK_Files_Users
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[FK_Topics_Users]') and OBJECTPROPERTY(id, N'IsForeignKey') = 1)
ALTER TABLE [dbo].[UploaderTopics] DROP CONSTRAINT FK_Topics_Users
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[UploaderFiles]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[UploaderFiles]
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[UploaderReplys]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[UploaderReplys]
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[UploaderTopicAttachments]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[UploaderTopicAttachments]
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[UploaderTopics]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[UploaderTopics]
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[UploaderUsers]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[UploaderUsers]
GO

CREATE TABLE [dbo].[UploaderFiles] (
	[FileId] [int] IDENTITY (1, 1) NOT NULL ,
	[UserId] [int] NOT NULL ,
	[Description] [nvarchar] (200) COLLATE Latin1_General_CI_AS NOT NULL ,
	[UploadTime] [datetime] NOT NULL ,
	[FileGuid] [uniqueidentifier] NOT NULL ,
	[FileSize] [int] NOT NULL ,
	[FileName] [nvarchar] (200) COLLATE Latin1_General_CI_AS NOT NULL ,
	[TempFileName] [nvarchar] (200) COLLATE Latin1_General_CI_AS NOT NULL ,
	[IPAddress] [nvarchar] (20) COLLATE Latin1_General_CI_AS NOT NULL 
) ON [PRIMARY]
GO

CREATE TABLE [dbo].[UploaderReplys] (
	[ReplyId] [int] IDENTITY (1, 1) NOT NULL ,
	[TopicId] [int] NOT NULL ,
	[UserId] [int] NOT NULL ,
	[UserName] [nvarchar] (50) COLLATE Latin1_General_CI_AS NOT NULL ,
	[ReplyBody] [ntext] COLLATE Latin1_General_CI_AS NOT NULL ,
	[ReplyTime] [datetime] NOT NULL ,
	[IPAddress] [nvarchar] (20) COLLATE Latin1_General_CI_AS NOT NULL 
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

CREATE TABLE [dbo].[UploaderTopicAttachments] (
	[AttachmentId] [int] IDENTITY (1, 1) NOT NULL ,
	[TopicId] [int] NOT NULL ,
	[FileGuid] [uniqueidentifier] NOT NULL ,
	[FileSize] [int] NOT NULL ,
	[FileName] [nvarchar] (200) COLLATE Latin1_General_CI_AS NOT NULL ,
	[TempFileName] [nvarchar] (200) COLLATE Latin1_General_CI_AS NOT NULL 
) ON [PRIMARY]
GO

CREATE TABLE [dbo].[UploaderTopics] (
	[TopicId] [int] IDENTITY (1, 1) NOT NULL ,
	[UserId] [int] NOT NULL ,
	[UserName] [nvarchar] (50) COLLATE Latin1_General_CI_AS NOT NULL ,
	[Title] [nvarchar] (200) COLLATE Latin1_General_CI_AS NOT NULL ,
	[TopicBody] [ntext] COLLATE Latin1_General_CI_AS NOT NULL ,
	[CreateTime] [datetime] NOT NULL ,
	[UpdateTime] [datetime] NOT NULL ,
	[FileCount] [int] NOT NULL ,
	[ViewCount] [int] NOT NULL ,
	[ReplyCount] [int] NOT NULL ,
	[IPAddress] [nvarchar] (20) COLLATE Latin1_General_CI_AS NOT NULL 
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

CREATE TABLE [dbo].[UploaderUsers] (
	[UserId] [int] IDENTITY (1, 1) NOT NULL ,
	[UserName] [nvarchar] (50) COLLATE Latin1_General_CI_AS NOT NULL ,
	[MailCount] [int] NOT NULL ,
	[UnreadMail] [int] NOT NULL ,
	[Signature] [nvarchar] (500) COLLATE Latin1_General_CI_AS NULL ,
	[Description] [nvarchar] (500) COLLATE Latin1_General_CI_AS NULL ,
	[PhotoTempFileName] [nvarchar] (250) COLLATE Latin1_General_CI_AS NULL ,
	[IPAddress] [nvarchar] (20) COLLATE Latin1_General_CI_AS NOT NULL 
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[UploaderFiles] WITH NOCHECK ADD 
	CONSTRAINT [PK_Files] PRIMARY KEY  CLUSTERED 
	(
		[FileId]
	)  ON [PRIMARY] 
GO
ALTER TABLE [dbo].[UploaderReplys] WITH NOCHECK ADD 
	CONSTRAINT [PK_Replys] PRIMARY KEY  CLUSTERED 
	(
		[ReplyId]
	)  ON [PRIMARY] 
GO

ALTER TABLE [dbo].[UploaderTopicAttachments] WITH NOCHECK ADD 
	CONSTRAINT [PK_TopicAttachments] PRIMARY KEY  CLUSTERED 
	(
		[AttachmentId]
	)  ON [PRIMARY] 
GO

ALTER TABLE [dbo].[UploaderTopics] WITH NOCHECK ADD 
	CONSTRAINT [PK_Topics] PRIMARY KEY  CLUSTERED 
	(
		[TopicId]
	)  ON [PRIMARY] 
GO

ALTER TABLE [dbo].[UploaderUsers] WITH NOCHECK ADD 
	CONSTRAINT [PK_Users] PRIMARY KEY  CLUSTERED 
	(
		[UserId]
	)  ON [PRIMARY] 
GO

ALTER TABLE [dbo].[UploaderFiles] ADD 
	CONSTRAINT [DF_Files_Description] DEFAULT ('') FOR [Description],
	CONSTRAINT [DF_Files_IPAddress] DEFAULT (N'0.0.0.0') FOR [IPAddress]
GO

 CREATE  INDEX [IX_Files_UserId] ON [dbo].[UploaderFiles]([UserId]) ON [PRIMARY]
GO

 CREATE  UNIQUE  INDEX [IX_Files_FileGuid] ON [dbo].[UploaderFiles]([FileGuid]) ON [PRIMARY]
GO

ALTER TABLE [dbo].[UploaderReplys] ADD 
	CONSTRAINT [DF_Replys_IPAddress] DEFAULT (N'0.0.0.0') FOR [IPAddress]
GO

 CREATE  INDEX [IX_Replys_TopicId] ON [dbo].[UploaderReplys]([TopicId]) ON [PRIMARY]
GO

 CREATE  INDEX [IX_TopicAttachments_TopicId] ON [dbo].[UploaderTopicAttachments]([TopicId]) ON [PRIMARY]
GO

 CREATE  UNIQUE  INDEX [IX_TopicAttachments_FileGuid] ON [dbo].[UploaderTopicAttachments]([FileGuid]) ON [PRIMARY]
GO

ALTER TABLE [dbo].[UploaderTopics] ADD 
	CONSTRAINT [DF_Topics_ViewCount] DEFAULT (0) FOR [ViewCount],
	CONSTRAINT [DF_Topics_ReplyCount] DEFAULT (0) FOR [ReplyCount],
	CONSTRAINT [DF_Topics_IPAddress] DEFAULT (N'0.0.0.0') FOR [IPAddress]
GO

 CREATE  INDEX [IX_Topics_UserId] ON [dbo].[UploaderTopics]([UserId]) ON [PRIMARY]
GO

 CREATE  INDEX [IX_Topics_UserName] ON [dbo].[UploaderTopics]([UserName]) ON [PRIMARY]
GO

 CREATE  INDEX [IX_Topics_Title] ON [dbo].[UploaderTopics]([Title]) ON [PRIMARY]
GO

 CREATE  INDEX [IX_Topics_CreateTime] ON [dbo].[UploaderTopics]([CreateTime]) ON [PRIMARY]
GO

 CREATE  INDEX [IX_Topics_UpdateTime] ON [dbo].[UploaderTopics]([UpdateTime]) ON [PRIMARY]
GO

ALTER TABLE [dbo].[UploaderUsers] ADD 
	CONSTRAINT [DF_Users_MailCount] DEFAULT (0) FOR [MailCount],
	CONSTRAINT [DF_Users_UnreadMail] DEFAULT (0) FOR [UnreadMail],
	CONSTRAINT [DF_Users_IPAddress] DEFAULT (N'0.0.0.0') FOR [IPAddress]
GO

 CREATE  UNIQUE  INDEX [IX_Users] ON [dbo].[UploaderUsers]([UserName]) ON [PRIMARY]
GO

ALTER TABLE [dbo].[UploaderFiles] ADD 
	CONSTRAINT [FK_Files_Users] FOREIGN KEY 
	(
		[UserId]
	) REFERENCES [dbo].[UploaderUsers] (
		[UserId]
	)
GO

ALTER TABLE [dbo].[UploaderReplys] ADD 
	CONSTRAINT [FK_Replys_Topics] FOREIGN KEY 
	(
		[TopicId]
	) REFERENCES [dbo].[UploaderTopics] (
		[TopicId]
	)
GO

ALTER TABLE [dbo].[UploaderTopicAttachments] ADD 
	CONSTRAINT [FK_TopicAttachments_Topics] FOREIGN KEY 
	(
		[TopicId]
	) REFERENCES [dbo].[UploaderTopics] (
		[TopicId]
	)
GO

ALTER TABLE [dbo].[UploaderTopics] ADD 
	CONSTRAINT [FK_Topics_Users] FOREIGN KEY 
	(
		[UserId]
	) REFERENCES [dbo].[UploaderUsers] (
		[UserId]
	)
GO


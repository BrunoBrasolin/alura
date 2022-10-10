namespace CursoWindowsForms
{
    partial class Frm_Principal
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Frm_Principal));
            this.Frm_DemonstracaoKey = new System.Windows.Forms.Button();
            this.Btn_HelloWorld = new System.Windows.Forms.Button();
            this.Btn_Mascara = new System.Windows.Forms.Button();
            this.Btn_Sair = new System.Windows.Forms.Button();
            this.Btn_ValidaSenha = new System.Windows.Forms.Button();
            this.Btn_ValidaCPF = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // Frm_DemonstracaoKey
            // 
            this.Frm_DemonstracaoKey.Image = ((System.Drawing.Image)(resources.GetObject("Frm_DemonstracaoKey.Image")));
            this.Frm_DemonstracaoKey.Location = new System.Drawing.Point(12, 12);
            this.Frm_DemonstracaoKey.Name = "Frm_DemonstracaoKey";
            this.Frm_DemonstracaoKey.Size = new System.Drawing.Size(114, 48);
            this.Frm_DemonstracaoKey.TabIndex = 0;
            this.Frm_DemonstracaoKey.Text = "Demonstração Key";
            this.Frm_DemonstracaoKey.UseVisualStyleBackColor = true;
            this.Frm_DemonstracaoKey.Click += new System.EventHandler(this.Frm_DemonstracaoKey_Click);
            // 
            // Btn_HelloWorld
            // 
            this.Btn_HelloWorld.Image = ((System.Drawing.Image)(resources.GetObject("Btn_HelloWorld.Image")));
            this.Btn_HelloWorld.Location = new System.Drawing.Point(132, 12);
            this.Btn_HelloWorld.Name = "Btn_HelloWorld";
            this.Btn_HelloWorld.Size = new System.Drawing.Size(114, 48);
            this.Btn_HelloWorld.TabIndex = 1;
            this.Btn_HelloWorld.Text = "Hello World";
            this.Btn_HelloWorld.UseVisualStyleBackColor = true;
            this.Btn_HelloWorld.Click += new System.EventHandler(this.Btn_HelloWorld_Click);
            // 
            // Btn_Mascara
            // 
            this.Btn_Mascara.Image = ((System.Drawing.Image)(resources.GetObject("Btn_Mascara.Image")));
            this.Btn_Mascara.Location = new System.Drawing.Point(252, 12);
            this.Btn_Mascara.Name = "Btn_Mascara";
            this.Btn_Mascara.Size = new System.Drawing.Size(114, 48);
            this.Btn_Mascara.TabIndex = 2;
            this.Btn_Mascara.Text = "Máscara";
            this.Btn_Mascara.UseVisualStyleBackColor = true;
            this.Btn_Mascara.Click += new System.EventHandler(this.Btn_Mascara_Click);
            // 
            // Btn_Sair
            // 
            this.Btn_Sair.BackColor = System.Drawing.Color.LightCoral;
            this.Btn_Sair.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Btn_Sair.Location = new System.Drawing.Point(252, 66);
            this.Btn_Sair.Name = "Btn_Sair";
            this.Btn_Sair.Size = new System.Drawing.Size(114, 48);
            this.Btn_Sair.TabIndex = 5;
            this.Btn_Sair.Text = "SAIR";
            this.Btn_Sair.UseVisualStyleBackColor = false;
            this.Btn_Sair.Click += new System.EventHandler(this.Btn_Sair_Click);
            // 
            // Btn_ValidaSenha
            // 
            this.Btn_ValidaSenha.Image = ((System.Drawing.Image)(resources.GetObject("Btn_ValidaSenha.Image")));
            this.Btn_ValidaSenha.Location = new System.Drawing.Point(132, 66);
            this.Btn_ValidaSenha.Name = "Btn_ValidaSenha";
            this.Btn_ValidaSenha.Size = new System.Drawing.Size(114, 48);
            this.Btn_ValidaSenha.TabIndex = 4;
            this.Btn_ValidaSenha.Text = "Valida Senha";
            this.Btn_ValidaSenha.UseVisualStyleBackColor = true;
            this.Btn_ValidaSenha.Click += new System.EventHandler(this.Btn_ValidaSenha_Click);
            // 
            // Btn_ValidaCPF
            // 
            this.Btn_ValidaCPF.Image = ((System.Drawing.Image)(resources.GetObject("Btn_ValidaCPF.Image")));
            this.Btn_ValidaCPF.Location = new System.Drawing.Point(12, 66);
            this.Btn_ValidaCPF.Name = "Btn_ValidaCPF";
            this.Btn_ValidaCPF.Size = new System.Drawing.Size(114, 48);
            this.Btn_ValidaCPF.TabIndex = 3;
            this.Btn_ValidaCPF.Text = "Valida CPF";
            this.Btn_ValidaCPF.UseVisualStyleBackColor = true;
            this.Btn_ValidaCPF.Click += new System.EventHandler(this.Btn_ValidaCPF_Click);
            // 
            // Frm_Principal
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(377, 126);
            this.Controls.Add(this.Btn_Sair);
            this.Controls.Add(this.Btn_ValidaSenha);
            this.Controls.Add(this.Btn_ValidaCPF);
            this.Controls.Add(this.Btn_Mascara);
            this.Controls.Add(this.Btn_HelloWorld);
            this.Controls.Add(this.Frm_DemonstracaoKey);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Name = "Frm_Principal";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Frm_Principal";
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Button Frm_DemonstracaoKey;
        private System.Windows.Forms.Button Btn_HelloWorld;
        private System.Windows.Forms.Button Btn_Mascara;
        private System.Windows.Forms.Button Btn_Sair;
        private System.Windows.Forms.Button Btn_ValidaSenha;
        private System.Windows.Forms.Button Btn_ValidaCPF;
    }
}
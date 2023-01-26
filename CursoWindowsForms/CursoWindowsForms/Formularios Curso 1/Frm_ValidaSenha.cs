using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows.Forms;
using CursoWindowsFormsBiblioteca;

namespace CursoWindowsForms
{
    public partial class Frm_ValidaSenha : Form
    {
        bool VerSenha = false;

        public Frm_ValidaSenha()
        {
            InitializeComponent();
        }

        private void Btn_Reset_Click(object sender, EventArgs e)
        {
            Txt_Senha.Text = String.Empty;
            Lbl_Resultado.Text = String.Empty;
        }

        private void Txt_Senha_KeyDown(object sender, KeyEventArgs e)
        {
            Cls_Uteis.ChecaForcaSenha verifica = new Cls_Uteis.ChecaForcaSenha();

            Cls_Uteis.ChecaForcaSenha.ForcaDaSenha forca = verifica.GetForcaDaSenha(Txt_Senha.Text);

            Lbl_Resultado.Text = forca.ToString();

            switch (forca)
            {
                case Cls_Uteis.ChecaForcaSenha.ForcaDaSenha.Inaceitavel:
                case Cls_Uteis.ChecaForcaSenha.ForcaDaSenha.Fraca:
                    Lbl_Resultado.ForeColor = Color.Red;
                    break;
                case Cls_Uteis.ChecaForcaSenha.ForcaDaSenha.Aceitavel:
                    Lbl_Resultado.ForeColor = Color.Blue;
                    break;
                case Cls_Uteis.ChecaForcaSenha.ForcaDaSenha.Forte:
                case Cls_Uteis.ChecaForcaSenha.ForcaDaSenha.Segura:
                    Lbl_Resultado.ForeColor = Color.Green;
                    break;
            }


        }

        private void Btn_VerSenha_Click(object sender, EventArgs e)
        {
            if (VerSenha)
            {
                Txt_Senha.PasswordChar = '*';
                Btn_VerSenha.Text = "Ver Senha";
            }
            else
            {
                Txt_Senha.PasswordChar = '\0';
                Btn_VerSenha.Text = "Esconder Senha";
            }
            VerSenha = !VerSenha;

        }
    }
}
